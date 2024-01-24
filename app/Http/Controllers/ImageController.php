<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        return Image::all();
    }
    
    public function store(ImageRequest $request)
    {
        dd($request);
        return Image::create($request->validated());
    }
    
    public function show(Image $image)
    {
        return $image;
    }
    
    public function update(ImageRequest $request, Image $image)
    {
        $image->update($request->validated());
        
        return $image;
    }
    
    public function destroy(Image $image)
    {
        $image->delete();
        
        return response()->json();
    }
}
