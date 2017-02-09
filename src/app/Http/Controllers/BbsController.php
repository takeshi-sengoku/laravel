<?php
namespace App\Http\Controllers;

use App\Http\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Bbs\ {
    CreateRequest,
    UpdateRequest,
    DeleteRequest
};

class BbsController extends Controller
{

    public function __construct()
    {}

    public function list()
    {
        return view('app/bbs/index', []);
    }

    public function create()
    {
        return view('app/bbs/create', []);
    }

    public function createCnf(CreateRequest $request)
    {
        return view('app/bbs/create_cnf', []);
    }

    public function createCmp()
    {}

    public function get($id)
    {
        return view('app/bbs/get', []);
    }

    public function update($id)
    {
        return view('app/bbs/update', []);
    }

    public function udpateCnf(UpdateRequest $request, $id)
    {
        return view('app/bbs/update_cnf', []);
    }

    public function udpateCmp($id)
    {}

    public function deleteCnf(DeleteRequest $request, $id)
    {
        return view('app/bbs/delete_cnf', []);
    }

    public function deleteCmp($id)
    {}
}
