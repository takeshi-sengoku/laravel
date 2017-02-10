<?php
namespace App\Http\Controllers;

use App\Http\Controller;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Admin\ {
    CreateRequest,
    UpdateRequest,
    DeleteRequest
};

class AuthController extends Controller
{

    public function __construct()
    {}

    public function index()
    {
        return view('app/admin/list', []);
    }

    public function create()
    {
        return view('app/admin/create', []);
    }

    public function createCnf(CreateRequest $request)
    {
        return view('app/admin/create_cnf', []);
    }

    public function createCmp()
    {}

    public function get($id)
    {
        return view('app/admin/get', []);
    }

    public function update($id)
    {
        return view('app/admin/update', []);
    }

    public function udpateCnf(UpdateRequest $request, $id)
    {
        return view('app/admin/update_cnf', []);
    }

    public function udpateCmp($id)
    {}

    public function deleteCnf(DeleteRequest $request, $id)
    {
        return view('app/admin/delete_cnf', []);
    }

    public function deleteCmp($id)
    {}
}
