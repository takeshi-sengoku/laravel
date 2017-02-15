<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Model\AccountModel;

class AccountComposer
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {}

    /**
     * コンポーザ
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $user_id = 100001000000000002;

        $view->with([
            'login_user' => AccountModel::get($user_id),
        ]);
    }
}
