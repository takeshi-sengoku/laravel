<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AccountAuthenticate
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        dd($auth);

        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            // ログインしていない時
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        }

        // ログインしている時
        return $next($request);
    }
}
