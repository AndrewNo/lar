<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{



    public function index()
    {
        $page = Page::find(1);
        return view('admin.tpls.index', ['page' => $page]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $page = Page::find($id);

        $page->index = $data['index'];
        $page->about = $data['about'];

        $page->save();

        return redirect('/admin/');
    }

    public function getLogin()
    {
        return view('admin.tpls.login');
    }

    public function postLogin(Request $request)

    {
        $data = $request->all();

        $attempt = \Auth::attempt([
            'login' => $data['login'],
            'password' => $data['password']
        ]);

        if ($attempt) {
            return redirect('/admin/');
        }

        dd('wrong');

    }

    public function postLogout()
    {
        \Auth::logout();

        return redirect('/admin/login');
    }
}
