<?php
namespace App\Http\Controllers;

use App\Http\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Sentence\ {
    CreateRequest,
    UpdateRequest,
    DeleteRequest
};
use sample\api\admin\Api\AdminApi;

class SentenceController extends Controller
{

    public function __construct()
    {}

    public function list()
    {
        $adminApi = new AdminApi();
        $config = $adminApi->getApiClient()->getConfig()->setSSLVerification(false);
        $config->addDefaultHeader('X-DatabaseUser', 'sample_admin');
        $adminApi->listAdmin();

        return view('app/sentence/list', []);
    }

    public function create()
    {
        return view('app/sentence/create', []);
    }

    public function createCnf(CreateRequest $request)
    {
        return view('app/sentence/create_cnf', []);
    }

    public function createCmp()
    {}

    public function get($id)
    {
        return view('app/sentence/get', []);
    }

    public function update($id)
    {
        return view('app/sentence/update', []);
    }

    public function udpateCnf(UpdateRequest $request, $id)
    {
        return view('app/sentence/update_cnf', []);
    }

    public function udpateCmp($id)
    {}

    public function deleteCnf(DeleteRequest $request, $id)
    {
        return view('app/sentence/delete_cnf', []);
    }

    public function deleteCmp($id)
    {}
}
