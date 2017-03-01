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
        $scope = ['read' => 'sentence', 'write' => 'sentence', 'write' => 'test'];

        if (!$request->session()->has('access-token')) {
            $redirect_url = sprintf(
                'http://192.168.56.101:3000?%s',
                http_build_query([
                    'response_type' => 'code',
                    'client_id'     => 'sample',
                    'scope'         => implode(' ', array_map(function ($key, $value) {return sprintf('%s:%s', $key, $value);}, array_keys($scope), array_values($scope))),
                    'state'         => 'f65d4aga',
                ])
            );
            return redirect(sprintf('http://192.168.56.101:3000/oauth/authorize?redirect_uri=%s', $redirect_url));
        }

        if ($request->session()->has('access-token')) {
            return $next($request);
        }

        dd(11);


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
