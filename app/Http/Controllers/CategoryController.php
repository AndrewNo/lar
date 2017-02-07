<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function catShow()
    {
        $categories = Category::all();

        return view('admin.category.show', ['categories' => $categories]);
    }

    public function catAdd()
    {

        return view('admin.category.add');
    }

    public function catStore(Request $request, Category $category)
    {
        $data = $request->all();

        $category->title = $data['title'];
        $category->alias = $data['alias'];
        $category->position = $data['position'];

        $category->save();

        return redirect('/admin/categories')->with('message', 'Category '.$category->title. ' was added!');
    }

    public function catEdit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', ['category' => $category]);
    }

    public function catUpdate(Request $request, $id)
    {
        $data = $request->all();

        $category = Category::find($id);

        $category->title = $data['title'];
        $category->alias = $data['alias'];
        $category->position = $data['position'];

        $category->save();

        return redirect('/admin/categories')->with('message', 'Category '.$category->title. ' was edited!');
    }

    public function catDelete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect('/admin/categories');
    }
}
