<?php

namespace App\Providers;
use App\PaymentService\Paypal;
use App\PaymentService\PaymentServiceInterface;
use App\PaymentService\Payu;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(Paypal::class,function(){
        //     return new Paypal("testid".rand(1,1500));
        // },true);

        // $paypal = new Paypal("testcode".rand(1,1500));
        // $this->app->instance(Paypal::class,$paypal);
        
        // $this->app->bind(PaymentServiceInterface::class,Payu::class);
        // App::bind(PaymentServiceInterface::class,Payu::class);
        app()->bind(PaymentServiceInterface::class,Payu::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
