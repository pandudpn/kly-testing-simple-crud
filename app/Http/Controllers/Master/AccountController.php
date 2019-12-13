<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account AS account;

class AccountController extends Controller
{
    public function index() {
        $title  = "Account";
        $account= Account::all();

        return view('content.account.index', compact('title', 'account'));
    }

    public function create(Request $request){
        if($request->isMethod('get')){
            $title  = 'New Account';
            return view('content.account.form', compact('title'));
        }else{
            $validation = [
                'name'  => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ];
            $rules      = [
                'required' => ':attribute cannot be null.',
                'email'    => ':attribute must be active email.'
            ];
            $names      = [
                'name' => 'Account Name',
                'email' => 'Email',
                'password' => 'Password'
            ];
            $this->validate($request, $validation, $rules, $names);

            $ac = new Account();
            $ac->name       = $request->input('name');
            $ac->email      = $request->input('email');
            $ac->password   = bcrypt(sha1($request->input('password')));

            $ac->save();

            return redirect('/account')->with('success', 'Success Create a New Account');
        }
    }

    public function edit(Request $request, $id){
        if($request->isMethod('get')){
            $title      = 'Edit Account';
            $account    = Account::find($id);

            return view('content.account.form', compact('title', 'account'));
        }else{
            $validation = [
                'name'  => 'required'
            ];
            $rules      = [
                'required' => ':attribute cannot be null.'
            ];
            $names      = [
                'name' => 'Account Name'
            ];
            $this->validate($request, $validation, $rules, $names);

            $ac = Account::find($id);
            $ac->name       = $request->input('name');

            $ac->save();

            return redirect('/account')->with('success', 'Success edit data Account '.$ac->name);
        }
    }

    public function delete($id){
        Account::destroy($id);
        return redirect('/account')->with('success', 'Success deleted account');
    }
}
