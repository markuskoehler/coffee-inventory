<?php

namespace App\Providers;

use Form;
use Illuminate\Support\Facades\Schema;
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
	    Schema::defaultStringLength(191);

	    // "bootstrap submit button with font-awesome icon" macro for Forms package
	    Form::macro('faSubmit', function($type = 'default', $icon = '')
	    {
	    	return '<button class="btn btn-' . $type . '" type="submit"><i class="fa fa-' . $icon . '" aria-hidden="true"></i></button>';
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
