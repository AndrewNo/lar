<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function prodShow()
    {
        $products = Product::all();


        return view('admin.product.show', ['products' => $products]);
    }

    public function prodAdd()
    {
        if (!\Auth::check()) {
            return redirect('admin/');
        }

        $categories = Category::all();

        return view('admin.product.add', ['categories' => $categories]);
    }

    public function prodStore(Request $request, Product $product)
    {
        $subdir = date('d-m-Y');
        $file = $request->file('image');
        $data = $request->all();

        $uploads = $root = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . $subdir . '/';

        if (!file_exists($uploads)) {
            mkdir($uploads);
        }

        if (!empty($request->file())) {
            $name = substr($file->getBasename(), 0, -4);

            Image::make($request->file('image'))->resize(150, 150)->save($uploads . '150_150_'
                . $name . '.' . $file->getClientOriginalExtension());


            $data['image'] = '/uploads/' . $subdir . '/150_150_'
                . $name . '.' . $file->getClientOriginalExtension();
        }

        if (isset($data['is_new'])) {
            $data['is_new'] = 1;
        } else {
            $data['is_new'] = 0;
        }

        if (isset($data['is_active'])) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }

        $product->title = $data['title'];
        $product->descr = $data['descr'];
        $product->category_id = $data['category_id'];
        $product->is_active = $data['is_active'];
        $product->position = $data['position'];
        $product->image = $data['image'];
        $product->is_new = $data['is_new'];

        $product->save();

        return redirect('/admin/shop');


    }

    public function prodEdit($id)
    {
        $product = Product::find($id);

        $categories = Category::all();


        return view('admin.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function prodUpdate(Request $request, $id)
    {
        $subdir = date('d-m-Y');
        $file = $request->file('image');
        $data = $request->all();

        $uploads = $root = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . $subdir . '/';

        if (!file_exists($uploads)) {
            mkdir($uploads);
        }

        if (!empty($request->file())) {
            $name = substr($file->getBasename(), 0, -4);

            Image::make($request->file('image'))->resize(150, 150)->save($uploads . '150_150_'
                . $name . '.' . $file->getClientOriginalExtension());


            $data['image'] = '/uploads/' . $subdir . '/150_150_'
                . $name . '.' . $file->getClientOriginalExtension();
        }

        if (isset($data['is_new'])) {
            $data['is_new'] = 1;
        } else {
            $data['is_new'] = 0;
        }

        if (isset($data['is_active'])) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }
        $product = Product::find($id);

        $product->title = $data['title'];
        $product->descr = $data['descr'];
        $product->category_id = $data['category_id'];
        $product->is_active = $data['is_active'];
        $product->position = $data['position'];
        isset($data['image']) ? $product->image = $data['image'] : false;
        $product->is_new = $data['is_new'];

        $product->save();

        return redirect('/admin/shop');
    }

    public function prodDelete($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect('/admin/shop');
    }

    public function indexShow()
    {
        $products = DB::table('products')
            ->where('is_active', '=', 1)
            ->orderBy('position', 'asc')
            ->get();

        $categories = DB::table('categories')
            ->orderBy('position', 'asc')
            ->get();

        return view('index.shop', ['products' => $products, 'categories' => $categories]);
    }

    public function byCategoryShow(Category $category, $alias){
        //$category = Category::all()->where('alias', '=', $alias);
            $category->product()->where('alias', '=', $alias);
        $category->getConnection();
        dd($category);
        //$products = Product::all()->where('category_id', '=', $category['id']);

    }
}
