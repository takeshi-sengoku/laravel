<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers as ViewComposers;

/**
 * ViewComposer用プロバイダ
 */
class ViewComposerProvider extends ServiceProvider
{

    /**
     * プロバイダブートストラップ
     */
    public function boot()
    {
        \View::composers([
            ViewComposers\AccountComposer::class => '*',
        ]);
    }
}
