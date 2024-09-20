@extends('layouts.app')

@section('content')
    <div>
        <h1>Wallet</h1>
        <p>Balance: ${{ Auth::user()->account->balance }}</p>

        <table class="table table-bordered m-5">
            <thead>
                <tr>
                    <th scope="col">Account Number</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->account_id }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->description ?? 'N/A' }}</td>
                        <td></td>
                    </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
