<?php

namespace App\Providers;

use App\Models\City;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Yajra\DataTables\Html\Builder;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
    */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
    */
    public function boot(): void
    {
        Paginator::useBootstrap();

        Blade::if('adminCan',function($permission){
            return auth('admin')->user()->can($permission);
        });

        Blade::if('adminCanAny',function($arrayPermission){
            return auth('admin')->user()->canany($arrayPermission);
        });

        $this->app->singleton('cities', function () {
            if(auth('admin')->user()->country_id != null){
                return City::select('id','name')->get();
            }
            return [];
        });
        
        Schema::defaultStringLength(191); 
        Builder::useVite();
    }

}
