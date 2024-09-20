<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function credit(Account $account){
        $data=request()->validate([
            'amount'=>'required|numeric',
        ]);
        $account=Auth::user()->account;
        $account->balance+=request()->input('amount');
        $account->save();
        Transaction::create([
            'account_id' => Auth::id(),
            'amount' => request()->input('amount'),
            'type' => 'credit']);
        return redirect('/home')->with('success','Successfully Credited!');

    }
    public function debit(){
        $data=request()->validate([
            'amount'=>'required|numeric',
        ]);
        $account=Auth::user()->account;
        $account->balance-=request()->input('amount');
        $account->save();

            Transaction::create([
                'account_id' => Auth::id(),
                'amount' => request()->input('amount'),
                'type' => 'debit']);
                return redirect('/home')->with('message','Successfully Debited!');

    }
    public function showAccount(){

        $users = User::with('account')->where('id', '!=', Auth::id())->get();
        return view('layouts.transfer', compact('users'));
    }

        public function transfer(Request $request)
        {

            $data = $request->validate([
                'account_id' => 'required|exists:accounts,id',
                'amount' => 'required|numeric|min:1',
            ]);
            $senderAccount=Auth::user()->account;
            $reciptentAccount=Account::findOrFail($data['account_id']);
            if($senderAccount->balance<$data['amount'])
            {
                return  redirect()->back()->with('error',"Insufficient balance !");
            }

            $senderAccount->balance-=request()->input('amount');
            $senderAccount->save();
            $reciptentAccount->balance+=request()->input('amount');
            $reciptentAccount->save();

            Transaction::create([
                'account_id' => $senderAccount->id,
                'amount' => $data['amount'],
                'type' => 'debit',
                'description' => "Transfer to " . $reciptentAccount->user->name,
            ]);
            Transaction::create([
                'account_id' => $senderAccount->id,
                'amount' => $data['amount'],
                'type' => 'credit',
                'description' => "Transfer From " . $senderAccount->user->name,
            ]);


            return redirect('/home')->with('su_cc', 'Rs.' .$data['amount'] .'/- Transferred successfully!');

        }
        public function statement(){
            $user = Auth::user();

            $transactions = Transaction::where('account_id', $user->id)->get();
            return view('layouts.statement',compact('transactions'));
        }



    }



