<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use App\Models\Products;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brands::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $brand = new brands();
        $brand->name = $request->input('name');

        $brand->save();

        return redirect()->route('adminbrands')->with('success', 'Brand added success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brands $brands)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brands $brands)
    {
        return view('admin.brands.edit',compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brands $brands)
    {
         $request->validate([
            'name' => 'required|string',
        ]);
        $brands->update([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('adminbrands')->with('success', 'Brand edited with sucess');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brands $brands)
    {
        $products = Products::where('brand_id', $brands->id)->get();


        foreach ($products as $product) {
            $product->update(['brand_id' => null]);
        }

        $brands->delete();
        return redirect()->route('adminbrands')->with('success', 'Brand deleted with sucess');
    }
}
