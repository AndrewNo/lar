<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function deleteImg($id)
    {
        $img = File::find($id);
        unlink($_SERVER['DOCUMENT_ROOT'] .'/public'. $img->image);
        $img->delete();

        return back();
    }
}
