<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth'])->except(['logout', 'login']);
    }

    public function index()
    {
        if (!\Auth::check()) {
            return redirect('admin/login');
        }

        $posts = Blog::all();
        return view('admin.tpls.index', ['posts' => $posts]);
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

        return redirect('/admin/');
    }
}
