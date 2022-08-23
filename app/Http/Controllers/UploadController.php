<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\PostImage;


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

    public function destroy($image)
    {
        $img = PostImage::find($image);
        PostImage::destroy($img->id);
        Storage::delete("/post-images/$img->image_name");
        toast('Image has been deleted !', 'success');
        return back();
    }
}
