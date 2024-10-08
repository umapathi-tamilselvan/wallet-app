<?php

namespace App\Http\Controllers;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('home');
    }

    public function account()
    {
        return view('layouts.account');
    }

    public function transfer()
    {
        return view('layouts.transfer');
    }
}
