<?php
namespace App\Http\Controllers;

use App\Http\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Sentence\ {
    CreateRequest,
    UpdateRequest,
    DeleteRequest
};
use App\Model\ {
    SentenceModel,
    AccountModel
};
use ickx\fw2\vartype\arrays\Arrays;

class SentenceController extends Controller
{

    public function __construct()
    {}

    public function list()
    {
        return view('app/sentence/list', [
            'sentence_list' => SentenceModel::list()['data'],
            'user_list' => $account_list = Arrays::MultiColumn(AccountModel::list()['data'], 'user_id'),
            'login_user' => $account_list['100001000000000002']
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

    public function get($screen_name, $id)
    {
        //$screen_name
        $user = AccountModel::search(AccountModel::apiModelFactory([
            'screen_name' => $screen_name
        ]))['data'] ?? [];
        $user = array_shift($user);

        $sentence = SentenceModel::get($id);

        return view('app/sentence/get', [
            'user' => $user,
            'sentence' => $sentence,

            //
            'user_list' => $account_list = Arrays::MultiColumn(AccountModel::list()['data'], 'user_id'),
            'login_user' => $account_list['100001000000000002']
        ]);
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
