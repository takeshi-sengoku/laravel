<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers as ViewComposers;

/**
 * ViewComposer�p�v���o�C�_
 */
class ViewComposerProvider extends ServiceProvider
{

    /**
     * �v���o�C�_�u�[�g�X�g���b�v
     */
    public function boot()
    {
        \View::composers([
        ]);
    }
}
