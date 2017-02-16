<?php // app/Http/Middleware/Authenticate.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate {

    protected $auth;

    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next) {
        return $next($request);

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
