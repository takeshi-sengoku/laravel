<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Custom\CustomValidator;

/**
 * Validator用プロバイダ
 */
class ValidatorServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::resolver(function ($translator, $data, $rules, $messages) {
            return new CustomValidator($translator, $data, $rules, $messages);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
