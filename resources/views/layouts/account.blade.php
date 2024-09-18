@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Wallet</h1>
        <p>Balance: ${{ Auth::user()->account->balance }}</p>


        <form action="" method="POST">
            @csrf
            <div class="form-group" style="width: 500px;>
                <label for="amount">Add Money:</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Money</button>
        </form>


        <form action="#" method="POST" style="margin-top:20px;">
            @csrf
            <div class="form-group" style="width: 500px;>
                <label for="amount">Withdraw Money:</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Withdraw Money</button>
        </form>
<div style="position: relative; height: 100vh;">
    <a href="#" class="btn btn-dark" style="position: absolute; bottom: 1165px; right: 10px;">Money Transfer</a>
    <!-- Other content here -->
</div>


    </div>
@endsection
