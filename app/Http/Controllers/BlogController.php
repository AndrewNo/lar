<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogShow()
    {
        $posts = Blog::all();
        return view('admin.blog.show', ['posts' => $posts]);
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

        return redirect('/admin/blog');
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

        return redirect('/admin/');
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
}
