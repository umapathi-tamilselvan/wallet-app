<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function ($user) {
            Account::create([
                'user_id' => $user->id,
                'balance' => 0.0,
            ]);
        });
    }
}
