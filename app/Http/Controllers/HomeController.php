<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class HomeController extends Controller
{
    public function index(){
        $title      = 'Home';
        $account    = Account::where('id', session('id'))->first();
        return view('content.home', compact('title', 'account'));
    }
}
