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

                    {{ __('Welcome ') }} {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                    <br>

                   <div class="mt-4 font-weight-bold">
                       <p>Your wallet balance: ${{ auth()->user()->account->balance }}</p>
                   </div>
                   <div class="d-flex justify-content-start mt-auto">
                    <a href="/home/account" class="btn btn-primary" role="button">
                       Wallet
                    </a>

                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
