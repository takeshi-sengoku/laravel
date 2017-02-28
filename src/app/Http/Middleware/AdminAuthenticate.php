<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Model\AdminAuthModel;
use App\Auth\AdminAuth;

class AdminAuthenticate
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        AdminAuth::__init($this->auth);
        if (AdminAuth::auth()) {
            return $next($request);
        }

        if (AdminAuth::isReturnedAuthCode()) {
            if (AdmintAuth::isAuthSuccess()) {
                return $next($request);
            } else {
                // どうすんの？
            }
        }

        return redirect('https://node.local-fw.com/admin/login');
    }
}
