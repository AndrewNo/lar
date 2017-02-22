<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogShow()
    {
        $posts = Blog::where('is_active', '=', 1)->get();

        $draft = Blog::where('is_active', '=', 0)->count();


        return view('admin.blog.show', ['posts' => $posts, 'draft' => $draft]);
    }

    public function postAdd()
    {
        if (!\Auth::check()) {
            return redirect('admin/');
        }

        return view('admin.blog.add');
    }

    public function postStore(Request $request, Blog $blog)
    {
        $data = $request->all();

        if (isset($data['is_active'])) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }

        $blog->title = $data['title'];
        $blog->content = $data['content'];
        $blog->is_active = $data['is_active'];
        $blog->save();

        if ($blog->is_active == 1) {
            $message = 'Пост '.$blog->title. ' сохранен и опубликован';
        }else {
            $message = 'Пост '.$blog->title. ' добавлен и сохранен в черновиках';
        }

        return redirect('/admin/blog')->with('message', $message);
    }

    public function postEdit($id)
    {
        $post = Blog::find($id);

        return view('admin.blog.edit', ['post' => $post]);
    }

    public function postUpdate(Request $request, $id)
    {
        $data = $request->all();

        if (isset($data['is_active'])) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }

        $post = Blog::find($id);

        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->is_active = $data['is_active'];
        $post->save();

        if ($post->is_active == 1) {
            $message = 'Пост '.$post->title. ' сохранен и опубликован';
        }else {
            $message = 'Пост '.$post->title. ' добавлен и сохранен в черновиках';
        }
        return redirect('/admin/blog')->with('message', $message);
    }

    public function postDelete($id)
    {
        $post = Blog::find($id);

        $post->delete();

        return redirect('/admin/');
    }

    public function indexShow()
    {
        $posts = Blog::all()->where('is_active', '=', 1);



        return view('index.blog', ['posts' => $posts]);
    }

    public function indexPostShow($id)
    {
        $post = Blog::find($id);

        return view('index.post', ['post' => $post]);
    }

    public function postDrafts()
    {
        $posts = Blog::where('is_active', '=', 0)->get();
        return view('admin.blog.draft', ['posts' => $posts]);
    }
}
