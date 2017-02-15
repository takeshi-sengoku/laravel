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
            'user_list' => Arrays::MultiColumn(AccountModel::list()['data'], 'user_id')
        ]);
    }

    public function timeline($screen_name)
    {
        // $screen_name
        $user = AccountModel::search(AccountModel::apiModelFactory([
            'screen_name' => $screen_name
        ]))['data'] ?? [];
        $user = array_shift($user);

        $sentence_list = SentenceModel::search(SentenceModel::apiModelFactory([
            'user_id' => $user['user_id']
        ]))['data'] ?? [];

        return view('app/sentence/timeline', [
            'user' => $user,
            'sentence_list' => $sentence_list
        ]);
    }

    public function create(CreateRequest $request)
    {
        SentenceModel::create(SentenceModel::apiModelFactory([
            'sentence' => $request->request->get('sentence'),
        ]));

        return response()->json(['result' => true]);
    }

    public function get($screen_name, $id)
    {
        // $screen_name
        $user = AccountModel::search(AccountModel::apiModelFactory([
            'screen_name' => $screen_name
        ]))['data'] ?? [];
        $user = array_shift($user);

        $sentence = SentenceModel::get($id);

        return view('app/sentence/get', [
            'user' => $user,
            'sentence' => $sentence
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
