<?php
// app/Http/Middleware/Authenticate.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\AuthController;

class Authenticate
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->isAuthed($request)) {
            return $next($request);
        }

        // 1. code取得のためのリダイレクト。認証画面へリダイレクトする
        $scope = [
            'read' => 'sentence',
            'write' => 'sentence',
            'write' => 'test'
        ];
        $redirect_url = sprintf('http://node.local-fw.com:3000/oauth/authorize?%s', http_build_query([
            'redirect_uri' => AuthController::REDIRECT_URI,
            'response_type' => 'code',
            'client_id' => 'sample',
            'scope' => implode(' ', array_map(function ($key, $value) {
                return sprintf('%s:%s', $key, $value);
            }, array_keys($scope), array_values($scope))),
            'state' => 'f65d4aga'
        ]));
        return redirect($redirect_url);
    }

    public function isAuthed($request)
    {
        if (! $request->session()->has('access-token')) {
            return false;
        }

        $access_token = $request->session()->get('access-token');

        return true;
    }
}
