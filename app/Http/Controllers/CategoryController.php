<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function catShow()
    {
        $categories = Category::orderBy('position', 'desc')->get();


        return view('admin.category.show', ['categories' => $categories]);
    }

    public function catAdd()
    {

        return view('admin.category.add');
    }

    public function catStore(Request $request, Category $category)
    {
        $data = $request->all();

        $position = Category::max('position');

        if ($position == null) {
            $position = 1;
        } else {
            $position += 1;
        }

        $category->title = $data['title'];
        $category->alias = $data['alias'];
        $category->position = $position;

        $category->save();

        return redirect('/admin/categories')->with('message', 'Категория ' . $category->title . ' добавлена!');
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


        $category->save();

        return redirect('/admin/categories')->with('message', 'Категория ' . $category->title . ' сохранена!');
    }

    public function catDelete($id)
    {
        $category = Category::find($id);



        foreach ($category->product as $item){
            $product = Product::find($item->id);
            $product->category_id = 0;
            $product->save();
        }


        $category->delete();

        return redirect('/admin/categories');
    }

    public function catChangePosition(Request $request)
    {
        $data = $request->all();

        if ($data['position'] == 'up') {
            $category = Category::find($data['id']);

            $lowerPosition = $category->position;
            $other = Category::where('position', '>', $category->position)->get();

            $someAction = $other->where('position', '=', Category::where('position', '>', $category->position)->min('position'))->toArray();

            $cat = [];

            foreach ($someAction as $item){
               $cat = $item;
            }


            $upperCategory = Category::find($cat['id']);
            $upperPosition = $upperCategory->position;

            $category->position = $upperPosition;
            $category->save();

            $upperCategory->position = $lowerPosition;
            $upperCategory->save();

            echo 'ok';
        }

        if ($data['position'] == 'down') {
            $category = Category::find($data['id']);

            $lowerPosition = $category->position;
            $other = Category::where('position', '<', $category->position)->get();

            $someAction = $other->where('position', '=', Category::where('position', '<', $category->position)->max('position'))->toArray();

            $cat = [];

            foreach ($someAction as $item){
                $cat = $item;
            }


            $upperCategory = Category::find($cat['id']);
            $upperPosition = $upperCategory->position;

            $category->position = $upperPosition;
            $category->save();

            $upperCategory->position = $lowerPosition;
            $upperCategory->save();

            echo 'ok';
        }

    }

}
