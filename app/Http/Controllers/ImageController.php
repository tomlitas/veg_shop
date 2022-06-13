<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('image.index', compact('images'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $name = $request->file('image')->getClientOriginalName();
        
        //$path = $request->file('image')->store('public'); 
        
        $request->image->move(public_path('images'),$name);
        $path='images/'.$name;

        $image = new Image;
        $image->name = $name;
        $image->path = $path;
        $image->save();

        return redirect()->route('image.index');
    }
}
