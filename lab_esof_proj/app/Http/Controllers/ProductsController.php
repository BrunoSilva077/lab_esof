<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Brands;
use App\Models\Categories;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Products::paginate(2);
        $products = Products::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'brand' => 'required|string',
            'categorie' => 'required|string'
            ]);

            try {
                $brand = Brands::where('name', $request->input('brand'))->firstOrFail();
                $categorie = Categories::where('name', $request->input('categorie'))->firstOrFail();
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                return back()->withErrors(['error' => 'Invalid brand or category selected.']);
            }

        Products::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'stock' => $request->input('stock'),
            'active' => $request->input('radio') === 'true', // Assume que o valor do rádio é uma string 'true' ou 'false'
            'price' => $request->input('price'),   
            'brand_id' => $brand->id,
            'categories_id' => $categorie->id,     
        ]);
        return redirect('adminproducts')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'stock' => 'required|numeric',
            'price' => 'required',
        ]);

        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'stock' => $request->input('stock'),
            'active' => $request->input('radio') === 'true',
            'price' => $request->input('price'),
        ]);
        
        return redirect('adminproducts')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string'
        ]);

        $search = $request->input('search');

        $products = Products::where('name', 'like', "%$search%")->get();

        return view('products.index', compact('products'));
    }

    public function slideshow(Request $request){
        $randomProducts = Product::inRandomOrder()->limit(3)->get();

        return view('home', compact('randomProducts'));
    }
}
