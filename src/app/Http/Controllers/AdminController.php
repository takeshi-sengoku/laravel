<?php
namespace App\Http\Controllers;

use App\Http\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use App\Http\Requests\Admin\ {
    CreateRequest,
    UpdateRequest,
    DeleteRequest
};

class AdminController extends Controller
{

    public function __construct()
    {}

    public function top()
    {
        return view('app/admin/top', []);
    }

    public function search()
    {
        return view('app/admin/search', []);
    }

    public function create()
    {
        return view('app/admin/create', Session::all());
    }

    public function createCnf(CreateRequest $request)
    {
        $request->session()->flash('form', $request->all());
        return view('app/admin/create_cnf', $request->all());
    }

    public function createCmp()
    {
        if (Request::has('back')) {
            return redirect()->route('admin@create')->withInput(Session::get('form'));
        }

        $form = Session::get('form');

        dd($form);



        return view('app/admin/create_cmp');
    }

    public function accountCreate()
    {}

    public function accountSearch()
    {
        return view('app/admin/account_search', []);
    }

    public function sentenceSearch()
    {
        return view('app/admin/sentence_search', []);
    }
}
