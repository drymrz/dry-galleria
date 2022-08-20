<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->has('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move('storage/post-images/', $imageName);
                return $imageName;
            }
        }
        return '';
    }

    // public function destroy($url)
    // {
    //     Storage::delete($url);
    // }
}
