<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
    
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        if(Schema::hasTable('categories')){
            View::share('categories', Category::orderBy('name')->get());
        }
    }
}
