<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class MasterLayoutServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $jsonFilePath = public_path('custom.json');
        if (File::exists($jsonFilePath)) {
            $customdata = json_decode(File::get($jsonFilePath), true);
            view()->composer('layouts.master', function ($view) use ($customdata) {
                $view->with('footerData', $customdata);
            });
        }
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
