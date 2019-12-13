<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Storage;

class CRUDController extends Controller
{
    public function index() {
        $title  = "Simple CRUD txt";
        $files  = File::allFiles(public_path().'/data/');

        return view('content.crud.index', compact('title', 'files'));
    }

    public function create(Request $request) {
        if($request->isMethod('get')){
            $title  = 'New Data';
            return view('content.crud.form', compact('title'));
        }else{
            $validation = [
                'name'      => 'required',
                'email'     => 'required|email',
                'birthday'  => 'required|date',
                'telp'      => 'required|numeric',
                'gender'    => 'required'
            ];
            $rules      = [
                'required' => ':attribute cannot be null.',
                'email'    => ':attribute must be active email.',
                'numeric'  => ':attribute should be number.',
                'date'     => ':attribute should be date'
            ];
            $names      = [
                'name' => 'Account Name',
                'email' => 'Email',
                'password' => 'Password',
                'birthday' => 'Birthday',
                'telp' => 'Phone Number',
                'gender' => 'Gender'
            ];
            $this->validate($request, $validation, $rules, $names);

            $name       = $request->input('name');
            $birthday   = $request->input('birthday');
            $email      = $request->input('email');
            $telp       = $request->input('telp');
            $gender     = $request->input('gender');

            $newName    = str_replace(' ', '', $name);

            $photos     = "foto-default.jpg";
            if($request->hasFile('photo')){
                $path       = 'images/';
                $extension  = strtolower($request->file('photo')->getClientOriginalExtension());
                $filename   = "foto-$newName"."-".date('dmYHis').".".$extension;
                $request->file('photo')->move($path, $filename);
                $photos     = $filename;
            }

            $content    = "$name,$email,".date('Y-m-d', strtotime($birthday)).",$telp,$gender,$photos";

            $filename   = $newName."-".date("dmYHis").".txt";

            $files      = File::put(public_path()."/data/$filename", $content);

            return redirect('/crud')->with('success', 'Success Create a New Data');
        }
    }

    public function edit(Request $request, $file) {
        if($request->isMethod('get')) {
            $title  = "Edit Data";
            $files  = explode(',', File::get(public_path()."/data/".$file.".txt"));

            return view("content.crud.form", compact("files", "title"));
        } else {
            $validation = [
                'name'      => 'required',
                'email'     => 'required|email',
                'birthday'  => 'required|date',
                'telp'      => 'required|numeric',
                'gender'    => 'required'
            ];
            $rules      = [
                'required' => ':attribute cannot be null.',
                'email'    => ':attribute must be active email.',
                'numeric'  => ':attribute should be number.',
                'date'     => ':attribute should be date'
            ];
            $names      = [
                'name' => 'Account Name',
                'email' => 'Email',
                'password' => 'Password',
                'birthday' => 'Birthday',
                'telp' => 'Phone Number',
                'gender' => 'Gender'
            ];
            $this->validate($request, $validation, $rules, $names);

            $name       = $request->input('name');
            $birthday   = $request->input('birthday');
            $email      = $request->input('email');
            $telp       = $request->input('telp');
            $gender     = $request->input('gender');

            $newName    = str_replace(' ', '', $name);

            $photos     = $request->input('photo_old');
            if($request->hasFile('photo')){
                $path       = 'images/';
                $extension  = strtolower($request->file('photo')->getClientOriginalExtension());
                $filename   = "foto-$newName"."-".date('dmYHis').".".$extension;
                $request->file('photo')->move($path, $filename);
                $photos     = $filename;
            }

            $content    = "$name,$email,".date('Y-m-d', strtotime($birthday)).",$telp,$gender,$photos";

            $filename   = $file.".txt";

            $files      = File::put(public_path()."/data/$filename", $content);

            return redirect('/crud')->with('success', 'Success Edit Data');
        }
    }

    public function delete($file) {
        $file   = File::delete(public_path()."/data/".$file);
        return redirect('/crud')->with('success', 'Success deleted a data');
    }
}
