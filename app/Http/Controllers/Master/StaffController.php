<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\Role;

class StaffController extends Controller
{
    public function index(){
        $title      = 'Periode';
        $staff      = Staff::select('staff.*', 'r.name AS role_name')
                            ->join('role AS r', 'r.id', '=', 'staff.role_id')
                            ->get();

        return view('content.staff.index', compact('title', 'staff'));
    }

    public function create(Request $request){
        if($request->isMethod('get')){
            $title  = 'New Staff';
            $role   = Role::all();
            return view('content.staff.form', compact('title', 'role'));
        }else{
            $validation = [
                'name'  => 'required',
                'phone' => 'required|numeric',
                'email' => 'required|email',
                'password' => 'required',
                'role'  => 'required'
            ];
            $rules      = [
                'required' => ':attribute cannot be null.',
                'numeric'  => ':attribute should be number.',
                'email'    => ':attribute must be active email.'
            ];
            $names      = [
                'name' => 'Staff Name',
                'phone' => 'Phone Number',
                'email' => 'Email',
                'role'  => 'Role Staff',
                'password' => 'Password'
            ];
            $this->validate($request, $validation, $rules, $names);

            $st = new Staff();
            $st->role_id    = $request->input('role');
            $st->name       = $request->input('name');
            $st->phone      = $request->input('phone');
            $st->email      = $request->input('email');
            $st->password   = bcrypt(sha1($request->input('password')));

            $st->save();

            return redirect('/staff')->with('success', 'Success Create a New Staff');
        }
    }

    public function edit(Request $request, $id){
        if($request->isMethod('get')){
            $title      = 'Edit Staff';
            $staff      = Staff::find($id);
            $role   = Role::all();
            return view('content.staff.form', compact('title', 'staff', 'role'));
        }else{
            $validation = [
                'name'  => 'required',
                'phone' => 'required|numeric'
            ];
            $rules      = [
                'required' => ':attribute cannot be null.',
                'numeric'  => ':attribute should be number.'
            ];
            $names      = [
                'name' => 'Staff Name',
                'phone' => 'Phone Number'
            ];
            $this->validate($request, $validation, $rules, $names);

            $st = Staff::find($id);
            $st->name       = $request->input('name');
            $st->phone      = $request->input('phone');
            $st->total_cuti = $request->input('total');

            $st->save();

            return redirect('/staff')->with('success', 'Success edit data staff '.$st->name);
        }
    }

    public function delete($id){
        Staff::destroy($id);
        return redirect('/staff')->with('success', 'Success deleted staff');
    }
}
