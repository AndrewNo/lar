<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function galShow()
    {
        $images = Gallery::all();

        return view('admin.gallery.show', ['images' => $images]);
    }

    public function galAdd()
    {
        return view('admin.gallery.add');
    }

    public function galStore(Request $request)
    {

        $subdir = date('d-m-Y');
        $uploads = $_SERVER['DOCUMENT_ROOT'] . "/uploads/gallery/" . $subdir . '/';


        if (!file_exists($uploads)) {
            mkdir($uploads);

        }

        if (!empty($request->file())) {
            foreach ($request->file('add_photo') as $photo['image']) {

                $gallery = new Gallery();

                $name = substr($photo['image']->getBasename(), 0, -4);

                Image::make($photo['image'])->save($uploads . $name . '.' .
                    $photo['image']->getClientOriginalExtension());

                $gallery->image = '/uploads/gallery/' . $subdir . '/' . $name . '.' .
                    $photo['image']->getClientOriginalExtension();

                $gallery->save();

            }

        }

        return redirect('/admin/gallery')->with('message', 'Image was added');
    }

    public function galDelete($id)
    {
        $photo = Gallery::find($id);

        unlink($_SERVER['DOCUMENT_ROOT'] . $photo->image);

        $photo->delete();

        return redirect('/admin/gallery');
    }

    public function indexShow()
    {
        $images = Gallery::all();

        return view('index.gallery', ['images' => $images]);
    }
}
