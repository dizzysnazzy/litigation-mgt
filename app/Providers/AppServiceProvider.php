<?php

namespace fms\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    public function register()
    {
        //
    }
}
