<?php

namespace App\Providers;

use Schema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
<<<<<<< HEAD
        //
=======
>>>>>>> 7bef1ff4a6624c6177341d940adec51203d89fb9
        Schema::defaultStringLength(191);
    }
}
