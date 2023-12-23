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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:png|max:2048',
        // ]);

        // $name = $request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->store('public/images');

        // $image = new Images();
        // $image->name = $name;
        // $image->path = $path;
        // $image->save();
        // return back()->with('success', 'Image Uploaded Successfully');
        $request->validate([
            'images.*' => 'required|image|mimes:png|max:2048',
            'images' => 'required|array|size:4',
        ]);
    
        foreach ($request->file('images') as $uploadedImage) {
            $name = $uploadedImage->getClientOriginalName();
            $path = $uploadedImage->store('public/images');
    
            $image = new Images();
            $image->name = $name;
            $image->path = $path;
            $image->save();
        }
    
        return back()->with('success', 'Images Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Images $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Images $image)
    {
        return view('partials.edit',compact('image'));
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


            $product = Products::where('name', $request->input('product'))->first();

            if (!$product) {
                return back()->withErrors(['error' => 'Invalid product selected.']);
            }
    
            $image->update([
                'name' => $request->input('name'),
                'product_id' => $product->id,
            ]);

            return redirect('adminimages')->with('success', 'Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Images $image)
    {
        //
    }
}
