<?php
namespace App\Http\Controllers;

use App\Http\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Account\ {
    CreateRequest,
    UpdateRequest,
    DeleteRequest
};

class AuthController extends Controller
{
    const REDIRECT_URI = 'https://laravel.local-fw.com/auth/code';

    public function __construct()
    {}

    public function code()
    {

        $code = $_GET['code'];

        // 2. 認証成功後、認可コード付きで返ってきた後に、token発行依頼
        $curl_init_with = function ($url, array $options = []) {
            $ch = curl_init();
            $options = array_replace([
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
            ], $options);
            curl_setopt_array($ch, $options);
            return $ch;
        };

        $body = http_build_query([
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => static::REDIRECT_URI,
        ]);

        $curl = $curl_init_with('http://node.local-fw.com:3000/oauth/token', [
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization' => sprintf('Basic %s', base64_encode('sample:secret')),
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            CURLOPT_POSTFIELDS => $body,
        ]);

        $response = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        dd($response,

            [
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => true,
                CURLOPT_HTTPHEADER => [
                    'Authorization' => sprintf('Basic %s', base64_encode('sample:secret')),
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                CURLOPT_POSTFIELDS => $body,
            ]

            );

        Session()::put('access-token', $body);
    }

    public function create()
    {
        return view('app/account/create', []);
    }

    public function createCnf(CreateRequest $request)
    {
        return view('app/account/create_cnf', []);
    }

    public function createCmp()
    {}

    public function get($id)
    {
        return view('app/account/get', []);
    }

    public function update($id)
    {
        return view('app/account/update', []);
    }

    public function udpateCnf(UpdateRequest $request, $id)
    {
        return view('app/account/update_cnf', []);
    }

    public function udpateCmp($id)
    {}

    public function deleteCnf(DeleteRequest $request, $id)
    {
        return view('app/account/delete_cnf', []);
    }

    public function deleteCmp($id)
    {}
}
