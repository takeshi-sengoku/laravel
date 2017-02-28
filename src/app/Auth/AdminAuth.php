<?php
namespace App\Auth;

class AdminAuth
{
    use Traits\OAuthTrait,
        \ickx\fw2\traits\objects\SugarAccessTrait;

    public function __construct()
    {}

    public function init()
    {
        return AdminAuthModel::auth();
    }
}
