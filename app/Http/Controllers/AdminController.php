<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Hash;
use App\Models\Page;
use App\User;
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

        return redirect('/admin/')->with('message', 'Изменения сохранены успешно');
    }

    public function getLogin()
    {
        return view('admin.tpls.login');
    }

    public function postLogin(Request $request)

    {

        $this->validate(request(), [
            'login' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $data = $request->all();

        $attempt = \Auth::attempt([
            'login' => $data['login'],
            'password' => $data['password']
        ]);

        if ($attempt) {
            return redirect('/admin/');
        }

        return back()->withErrors([
            'message' => 'Не правильно введен пароль или логин. Попробуйте еще раз!'
        ]);

    }

    public function postLogout()
    {
        \Auth::logout();

        return redirect('/admin/login');
    }

    public function showSettings()
    {

        $user = \Auth::user();

        return view('admin.settings.show', ['user' => $user]);
    }

    public function updateSettings(Request $request, $id)
    {

        $this->validate(request(), [
            'login' => 'required',
            'email' => 'required|email'
        ]);

        $data = $request->all();
        $user = User::find($id);

        if ($data['old_password'] != null || $data['new_password'] != null) {
            if (Hash::check($data['old_password'], $user->password)) {
                $user->password = bcrypt($data['new_password']);
            } else {
                return back()->with('message', 'Не верный старый пароль');
            }
        }

        $user->login = $data['login'];
        $user->email = $data['email'];


        $user->save();

        return back()->with('message', 'Данные успешно обновлены');
    }
}
