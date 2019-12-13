<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Staff;

class CutiController extends Controller
{
    public function index(){
        $title      = 'Cuti';
        $cuti       = Cuti::orderBy('status', 'desc');
        if(session('role') != 3) {
            $cuti   = $cuti->select('cuti.*', 'staff.name AS staff_name')
                            ->join('staff', 'staff.id', '=', 'cuti.staff_id');
        }else {
            $cuti   = $cuti->where('staff_id', session('id'));
        }

        $cuti   = $cuti->get();
        return view('content.cuti.index', compact('title', 'cuti'));
    }

    public function create(Request $request){
        if($request->isMethod('get')){
            $title  = 'Create a New Cuti';
            return view('content.cuti.form', compact('title'));
        }else{
            $staff  = Staff::where('id', session('id'))->first();
            $validation = [
                'from'      => 'required|after:tomorrow',
                'to'        => 'required|after:from'
            ];
            $value      = [
                'required'  => ':attribute cannot be null.',
                'after:tomorrow'   => ':attribute must be greater than tomorrow',
                'after:from'       => ':attribute must be greater than From Date'
            ];
            $names      = [
                'after:tomorrow'    => 'From Date',
                'after:from'        => 'End Date'
            ];

            $this->validate($request, $validation, $value, $names);
            $to     = date_create($request->input('to'));
            $from   = date_create($request->input('from'));

            $dif    = date_diff($from, $to);
            
            if($staff->total_cuti >= $dif->d) {
                $ct     = new Cuti();
                $ct->staff_id   = session('id');
                $ct->from       = $from;
                $ct->to         = $to;
                $ct->save();

                return redirect('/cuti')->with('success', 'Success create a new Cuti');
            }else{
                return redirect('/cuti')->with('error', 'Jatah Cuti Tidak Cukup.');
            }
        }
    }

    public function edit(Request $request, $id){
        // if($request->isMethod('get')){
        //     $title      = 'Edit Cuti';
        //     $cuti       = Cuti::find($id);
        //     $staff      = Staff::where('role_id', '!=', 1)
        //                     ->get();
        //     return view('content.cuti.form', compact('title', 'cuti', 'staff'));
        // }else{
        //     $validation = [
        //         'staff'     => 'required',
        //         'total'     => 'required'
        //     ];
        //     $value      = [
        //         'required'  => ':attribute cannot be null.',
        //         'numeric'   => ':attribute must be number.'
        //     ];
        //     $names      = [
        //         'staff'     => 'Staff Name',
        //         'total'     => 'Total Cuti'
        //     ];

        //     $this->validate($request, $validation, $value, $names);

        //     $ct     = Cuti::find($id);
        //     $ct->staff_id   = $request->input('staff');
        //     $ct->total      = $request->input('total');
        //     $ct->save();

        //     return redirect('/cuti')->with('success', 'Success edit data cuti');
        // }
    }

    public function reject($id) {
        $cuti   = Cuti::where('id', $id)->update([
            'status'    => 'reject'
        ]);

        return redirect('/cuti')->with('success', 'Success reject submission cuti');
    }

    public function approve($id) {
        $cuti   = Cuti::where('id', $id)->update([
            'status'    => 'accept'
        ]);

        return redirect('/cuti')->with('success', 'Success approve submission cuti');
    }
}
