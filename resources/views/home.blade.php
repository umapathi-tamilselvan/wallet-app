@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('success'))
            <div id="autoHideAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('message'))
            <div id="autoHideAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('su_cc'))
            <div id="autoHideAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('su_cc') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
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
                            <p>Your wallet balance: ₹{{ auth()->user()->account->balance }}</p>
                        </div>
                        <div class="align-center">
                            <a href="/home/account" class="p-2 btn btn-primary">Credit/Debit</a>
                            <a href="/home/account/transfer" class="p-2 btn btn-primary">Transfer Money</a>
                            <a href="/home/statement" class="p-2 btn btn-primary">Statement</a>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
