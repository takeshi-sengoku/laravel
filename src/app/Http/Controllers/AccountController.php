<?php
namespace App\Http\Controllers;

use App\Http\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Account\ {
    CreateRequest,
    UpdateRequest,
    DeleteRequest
};

class AccountController extends Controller
{

    public function __construct()
    {}

    public function index()
    {
        return view('app/account/list', []);
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
