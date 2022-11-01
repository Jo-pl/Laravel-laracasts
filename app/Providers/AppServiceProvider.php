<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
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
        //Fix for the php artisan migrate script
        Schema::defaultStringLength(191);
        Model::unguard();
        //change this logic later
        Gate::define('admin', function (User $user) {
            return $user->username === 'admin';
        });

        Blade::if('admin', function () {
            if(request()->user()){
            return request()->user()->can('admin');
            }else{
                return false;
            }
        });
    }
}
