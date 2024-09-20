@extends('layouts.app')

@section('content')




    <div class="container" >

 


        <h1>Wallet</h1>
        <p>Balance: ${{ Auth::user()->account->balance }}</p>




        <form method="POST" action="{{ route('wallet.transfer') }}">
            @csrf

            <div class="form-group">
                <label for="account_id">Select Recipient</label>
                <select name="account_id" class="form-control" required>
                    <option value="">-- Select Recipient --</option>
                    @foreach($users as $user)
                        @if($user->id != Auth::user()->id)
                            <option value="{{ $user->account->id }}">
                                {{ $user->name }} (Account ID: {{ $user->account->id }}, Balance: {{ $user->account->balance }})
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" class="form-control" required min="1">
            </div>

            <button type="submit" class="btn btn-primary">Transfer Money</button>
        </form>




    </div>
@endsection
