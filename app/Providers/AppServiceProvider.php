<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator ; 
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('single_word', function ($attribute, $value, $parameters, $validator) {
                 return is_string($value) && ! preg_match('/\s/', $value);
         });
   }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
