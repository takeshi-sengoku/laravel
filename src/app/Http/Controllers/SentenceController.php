<?php
namespace App\Http\Controllers;

use App\Http\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Sentence\ {
    CreateRequest,
    UpdateRequest,
    DeleteRequest
};
use App\Model\SentenceModel;
use App\Model\AdminModel;
use sample\api\account\Model\Account;
use App\Model\AccountModel;

class SentenceController extends Controller
{

    public function __construct()
    {}

    public function list()
    {
        $account_list = AccountModel::list();
dd($account_list);
        $sentence_list = SentenceModel::list();

        return view('app/sentence/list', [
            'sentence_list' => $sentence_list['data'],
            //
            'login_user' => [
                'user_id' => '100001000000000001',
            ],
            'user_list' => [
                '100001000000000001' => [
                    'screen_name' => 'sakura',
                    'name' => 'さくら',
                ],
                '100001000000000002' => [
                    'screen_name' => 'unyuu',
                    'name' => 'うにゅう',
                ],
            ],
        ]);
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
