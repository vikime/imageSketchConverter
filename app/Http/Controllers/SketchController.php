<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
use Imagine\Gd\Imagine;
use Imagine\Image\Palette\Color\RGB;

class SketchController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

   public function convert(Request $request)
    {
            $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image');
        $imageName = time() . '.' . $imagePath->extension();
        $imageAbsoluteFilePath = public_path('images/' . $imageName);

        $image = Image::make($imagePath->getRealPath());

     
        $image->greyscale();

     
        $image->blur(10);

        
        $image->invert();

        $image->save($imageAbsoluteFilePath);

        return back()
            ->with('success', 'Image converted to sketch successfully.')
            ->with('imageName', $imageName);
    
    }
}
