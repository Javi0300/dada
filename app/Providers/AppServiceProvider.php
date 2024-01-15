<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use App\Models\Syswebconf;
use App\Providers\SimpleXMLElement;
use Exception;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }


    public function boot()/* : void */
    {
        //$mindex= substr(isset($_SERVER['REQUEST_URI']),(strlen(isset($_SERVER['REQUEST_URI'])))-9,9); 
        
    }
}