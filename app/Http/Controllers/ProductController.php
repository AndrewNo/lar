<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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
        $file = $request->file('image');
        $data = $request->all();

        $uploads = $root = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . date('d-m-Y') . '/';

        if (!file_exists($uploads)) {
            mkdir($uploads);
        }

        if (!empty($request->file())) {
            $name = substr($file->getBasename(), 0, -4);

            Image::make($request->file('image'))->resize(150, 150)->save($uploads . '150_150_'
                . $name . '.' . $file->extension());


            $data['image'] = '/uploads/150_150_'
                . $name . '.' . $file->extension();
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
}
