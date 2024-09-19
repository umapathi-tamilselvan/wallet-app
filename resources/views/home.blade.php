@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-uppercase">
                            {{ __('Welcome ') }} {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                    </div>
                    <br>

                   <div class="mt-4 font-weight-bold">
                       <p>Your wallet balance: ${{ auth()->user()->account->balance }}</p>
                   </div>
                   <div class="align-center">
                    <a href="/home/account" class="p-2 btn btn-primary">Credit/Debit</a>
                    <a href="/home/account/transfer" class="p-2 btn btn-primary">Transfer Money</a>
                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
