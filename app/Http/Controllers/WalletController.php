<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('home');
    }
    public function account(){
        return view('layouts.account');
    }
    public function addfund(Request $request){
        $request->validate([
            'amount'=>'required|numeric'
        ]);

    }
}
