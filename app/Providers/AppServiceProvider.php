<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        try {
            Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
            Schema::hasTable('setting');
            $web_config = DB::table('setting')->pluck('value','key');
            config(['web_config'=>$web_config]);
        }catch(\Exception $e){
            
        }
    }
}
