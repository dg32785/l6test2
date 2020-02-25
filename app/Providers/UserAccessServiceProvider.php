<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\UserAccess\UserAccess;

class UserAccessServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('useraccess',function (){
            return new UserAccess();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
