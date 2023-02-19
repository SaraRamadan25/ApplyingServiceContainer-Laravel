<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // your app is your entire app
        // callback function
        // singleton->same instance  -- bind -> fresh instances
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            if (request()->has('credit')){
                return new CreditPaymentGateway('usd');
            }
            return new BankPaymentGateway('usd');
        });
        }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
