<?php 
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*','App\Http\ViewComposers\All');
        view()->composer(['partials.filters.criminals','partials.filters.groups'],'App\Http\ViewComposers\SearchFilters');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
