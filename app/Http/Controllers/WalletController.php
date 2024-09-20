<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();

        $transactions = Transaction::where('account_id', $user->id)->get();
        //uesd for show data from the database(model query
        return view('home', compact('transactions'));
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
