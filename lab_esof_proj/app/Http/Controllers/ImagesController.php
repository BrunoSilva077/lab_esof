<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Products::all();
        return view('partials.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Products $product)
    {
        $request->validate([
            'image' => 'required|image|mimes:png|max:2048',
        ]);

        $name = $request->file('image')->getClientOriginalName();
        $request->file('image')->store('public/images');

        $image = new Images();
        $image->name = $name;
        $image->path = $request->file('image')->hashName();
        $image->product_id = $request->input('product');
        $image->save();
        return redirect('adminimages')->with('success', 'Image Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Images $image)
    {
        return back();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Images $image)
    {
        $products = Products::all();
        return view('partials.edit',compact('image','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Images $image)
    {
        $request->validate([
            'name' => 'required|string',
            'product' => 'required|string',
        ]);
            $image->update([
                'name' => $request->input('name'),
                'product_id' => $request->input('product'),
            ]);
            return redirect('adminimages')->with('success', 'Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Images $image)
    {
        $image->delete();
        return redirect('adminimages')->with('success', 'Image deleted successfully');
    }
}