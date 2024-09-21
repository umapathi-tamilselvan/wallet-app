<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Mail\DebitMail;
use App\Models\Account;
use App\Mail\CreditMail;
use App\Mail\TransferMail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function credit(Account $account, User $user)
    {
        $data = request()->validate([
            'amount' => 'required|numeric',
        ]);
        $user=Auth::user();
        $account = $user->account;
        $account->balance += $data['amount'];
        $account->save();
        Mail::to($user->email)->send(new CreditMail($user,$data['amount']));
                                                                    //used to validate,add amount and store the data to database;
        Transaction::create([
            'account_id' => Auth::id(),
            'amount' => $data['amount'],
            'type' => 'credit',
        ]);
        $account->save();


        return redirect('/home')->with('success', 'Successfully Credited!');
    }

    public function debit()
    {
        $data = request()->validate([
            'amount' => 'required|numeric',
        ]);
        $user=Auth::user();
        $account = $user->account;
        $account->balance -= $data['amount'];                               //validate,debit amount and store;
        $account->save();
        Mail::to($user->email)->send(new DebitMail($user,$data['amount']));
        Transaction::create([
            'account_id' => Auth::id(),
            'amount' => $data['amount'],
            'type' => 'debit',
        ]);

        return redirect('/home')->with('message', 'Successfully Debited!');
    }

    public function showAccount()
    {

        $users = User::with('account')->where('id', '!=', Auth::id())->get();

        return view('layouts.transfer', compact('users'));
    }

    public function transfer(Request $request)
    {

        $data = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'amount' => 'required|numeric|min:1',
        ]);
        $user=Auth::user();
        $senderAccount = $user->account;
        $reciptentAccount = Account::findOrFail($data['account_id']);
        if ($senderAccount->balance < $data['amount']) {
            return redirect()->back()->with('error', 'Insufficient balance !');
        }

        $senderAccount->balance -= $data['amount'];
        $senderAccount->save();
        $reciptentAccount->balance += $data['amount'];
        $reciptentAccount->save();
        Mail::to($user)->send(new TransferMail($user,$data['amount'],$data['account_id']));
        Transaction::create([
            'account_id' => $senderAccount->id,
            'amount' => $data['amount'],
            'type' => 'debit',
            'description' => 'Transfer to '.$reciptentAccount->user->name,
        ]);
        Transaction::create([
            'account_id' => $senderAccount->id,
            'amount' => $data['amount'],
            'type' => 'credit',
            'description' => 'Transfer From '.$senderAccount->user->name,
        ]);

        return redirect('/home')->with('su_cc', 'Rs.'.$data['amount'].'/- Transferred successfully!');
    }

    public function statement()
    {
        $user = Auth::user();

        $transactions = Transaction::where('account_id', $user->id)->get();

        return view('layouts.statement', compact('transactions'));
    }
}
