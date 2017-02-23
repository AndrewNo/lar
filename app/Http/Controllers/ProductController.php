<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function prodShow()
    {
        $products = Product::active()->orderBy('position', 'desc')->get();

        $store = Product::where('is_active', '=', 0)->count();

        $categories = Category::all();

        return view('admin.product.show', ['products' => $products, 'store' => $store, 'categories' => $categories]);
    }

    public function prodAdd()
    {

        $categories = Category::all();

        return view('admin.product.add', ['categories' => $categories]);
    }

    public function prodStore(Request $request, Product $product)
    {

        $subdir = date('d-m-Y');
        $file_data = $request->file('image');
        $data = $request->all();

        $uploads = $root = $_SERVER['DOCUMENT_ROOT'] . "/public/uploads/" . $subdir . '/';

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

        $position = Product::max('position');

        if ($position == null) {
            $position = 1;
        } else {
            $position += 1;
        }

        $product->title = $data['title'];
        $product->descr = $data['descr'];
        $product->category_id = $data['category_id'];
        $product->is_active = $data['is_active'];
        $product->position = $position;
        $product->is_new = $data['is_new'];

        $product->save();


        if (!file_exists($uploads)) {
            mkdir($uploads);
        }

        if (!empty($request->file('image'))) {

            $file = new File();
            $name = substr($file_data->getBasename(), 0, -4);

            Image::make($request->file('image'))->save($uploads . $name . '.' . $file_data->getClientOriginalExtension());

            $file->product_id = $product->id;
            $file->type = 'main';
            $file->image = '/uploads/' . $subdir . '/' . $name . '.' . $file_data->getClientOriginalExtension();

            $file->save();
        }

        if (!empty($request->file('add_photo'))) {
            foreach ($request->file('add_photo') as $photo['image']) {


                $file = new File();
                $name = substr($photo['image']->getBasename(), 0, -4);

                Image::make($photo['image'])->save($uploads . $name . '.' .
                    $photo['image']->getClientOriginalExtension());

                $file->product_id = $product->id;
                $file->type = 'cover';
                $file->image = '/uploads/' . $subdir . '/' . $name . '.' .
                    $photo['image']->getClientOriginalExtension();

                $file->save();

            }

        }

        if ($product->is_active == 1) {
            $message = 'Изделие ' . $product->title . ' добавлено и выставлено на витрину';
        } else {
            $message = 'Изделие ' . $product->title . ' добавлено и перемещено в склад';
        }

        return redirect('/admin/shop')->with('message', $message);


    }

    public function prodEdit($id)
    {
        $product = Product::find($id);

        $main_pic = File::all()->where('product_id', '=', $id)->where('type', '=', 'main');

        $cover = File::all()->where('product_id', '=', $id)->where('type', '=', 'cover');

        $categories = Category::all();


        return view('admin.product.edit', ['product' => $product, 'categories' => $categories, 'main_pic' =>
            $main_pic, 'cover' => $cover]);
    }

    public function prodUpdate(Request $request, $id)
    {
        $subdir = date('d-m-Y');
        $file_data = $request->file('image');
        $data = $request->all();

        $uploads = $_SERVER['DOCUMENT_ROOT'] . "/public/uploads/" . $subdir . '/';

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
        $product->is_new = $data['is_new'];

        $product->save();

        if (!file_exists($uploads)) {
            mkdir($uploads);
        }

        if (!empty($request->file('image'))) {

            if (isset($data['main_id'])) {
                $file = File::find($data['main_id']);
            } else {
                $file = new File();
            }

            $name = substr($file_data->getBasename(), 0, -4);

            Image::make($request->file('image'))->save($uploads . $name . '.' . $file_data->getClientOriginalExtension());

            $file->product_id = $id;
            $file->type = 'main';
            $file->image = '/uploads/' . $subdir . '/' . $name . '.' . $file_data->getClientOriginalExtension();

            $file->save();
        }

        if (!empty($request->file('add_photo'))) {
            foreach ($request->file('add_photo') as $photo['image']) {


                $file = new File();
                $name = substr($photo['image']->getBasename(), 0, -4);

                Image::make($photo['image'])->save($uploads . $name . '.' .
                    $photo['image']->getClientOriginalExtension());

                $file->product_id = $id;
                $file->type = 'cover';
                $file->image = '/uploads/' . $subdir . '/' . $name . '.' .
                    $photo['image']->getClientOriginalExtension();

                $file->save();

            }

        }

        if ($product->is_active == 1) {
            $message = 'Изделие ' . $product->title . ' добавлено и выставлено на витрину';
        } else {
            $message = 'Изделие ' . $product->title . ' добавлено и перемещено в склад';
        }
        return redirect('/admin/shop')->with('message', $message);
    }

    public function prodDelete($id)
    {
        $product = Product::find($id);

        $product->delete();

        return back();
    }

    public function indexShow()
    {
        $products = Product::active()->orderBy('position', 'desc')->get();

        $categories = Category::orderBy('position', 'desc')->get();

        return view('index.shop', ['products' => $products, 'categories' => $categories]);
    }

    public function byCategoryShow($alias)
    {

        $category = Category::where('alias', '=', $alias)->get()->toArray();

        $products = Product::active()->where('category_id', '=', $category[0]['id'])->orderBy('position', 'desc')
            ->get();

        $categories = Category::orderBy('position', 'desc')->get();

        return view('index.category_products', ['products' => $products, 'categories' => $categories]);

    }

    public function byCategoryId($alias)
    {

        dd($alias);
        $category = Category::where('alias', '=', $alias)->get()->toArray();

        $products = Product::active()->where('category_id', '=', $category[0]['id'])->orderBy('position', 'desc')
            ->get();

        $categories = Category::orderBy('position', 'desc')->get();

        return view('admin.product.show', ['products' => $products, 'categories' => $categories]);

    }

    public function indexProductShow($id)
    {
        $product = Product::find($id);

        $categories = Category::orderBy('position', 'desc')->get();

        return view('index.product', ['product' => $product, 'categories' => $categories]);
    }

    public function prodInStore()
    {
        $products = Product::where('is_active', '=', 0)->get();


        return view('admin.product.store', ['products' => $products]);
    }

    public function prodChangePosition(Request $request)
    {
        $data = $request->all();

        if ($data['position'] == 'up') {
            $category = Product::find($data['id']);

            $lowerPosition = $category->position;
            $other = Product::where('position', '>', $category->position)->get();

            $someAction = $other->where('position', '=', Product::where('position', '>', $category->position)->min('position'))->toArray();

            $cat = [];

            foreach ($someAction as $item) {
                $cat = $item;
            }


            $upperCategory = Product::find($cat['id']);
            $upperPosition = $upperCategory->position;

            $category->position = $upperPosition;
            $category->save();

            $upperCategory->position = $lowerPosition;
            $upperCategory->save();

            echo 'ok';
        }

        if ($data['position'] == 'down') {
            $category = Product::find($data['id']);

            $lowerPosition = $category->position;
            $other = Product::where('position', '<', $category->position)->get();

            $someAction = $other->where('position', '=', Product::where('position', '<', $category->position)->max('position'))->toArray();

            $cat = [];

            foreach ($someAction as $item) {
                $cat = $item;
            }


            $upperCategory = Product::find($cat['id']);
            $upperPosition = $upperCategory->position;

            $category->position = $upperPosition;
            $category->save();

            $upperCategory->position = $lowerPosition;
            $upperCategory->save();

            echo 'ok';
        }
    }

}
