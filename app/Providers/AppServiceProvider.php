<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	// Compratiendo datos en todas las vistas
    	 
    	\View::composer('*', function($view){
    		$view->with('usuario', \Auth::User());
    	});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    	// Generators solo en entorno local
    	if ($this->app->environment() == 'local') {
    		$this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
    	}
    }
}
