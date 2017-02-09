<?php
namespace App\Http\Controllers;

use App\Http\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\User\ {
    CreateRequest,
    UpdateRequest,
    DeleteRequest
};

class UserController extends Controller
{

    public function __construct()
    {}

    public function index()
    {
        return view('app/user/index', []);
    }

    public function create()
    {
        return view('app/user/create', []);
    }

    public function createCnf(CreateRequest $request)
    {
        return view('app/user/create_cnf', []);
    }

    public function createCmp()
    {}

    public function get($id)
    {
        return view('app/user/get', []);
    }

    public function update($id)
    {
        return view('app/user/update', []);
    }

    public function udpateCnf(UpdateRequest $request, $id)
    {
        return view('app/user/update_cnf', []);
    }

    public function udpateCmp($id)
    {}

    public function deleteCnf(DeleteRequest $request, $id)
    {
        return view('app/user/delete_cnf', []);
    }

    public function deleteCmp($id)
    {}
}
