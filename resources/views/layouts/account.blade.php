@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Wallet</h1>
        <p>Balance: ₹{{ Auth::user()->account->balance }}</p>


        <form action="/addmoney" method="POST">
            @csrf
            <div class="form-group" style="width: 500px;>
                <label for="amount">Add Money:</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Money</button>
        </form>


        <form action="/withdraw" method="POST" style="margin-top:20px;">
            @csrf
            <div class="form-group" style="width: 500px;>
                <label for="amount">Withdraw Money:</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Withdraw Money</button>
        </form>

    </div>
@endsection
