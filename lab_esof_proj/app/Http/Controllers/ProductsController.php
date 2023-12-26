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
    public function index(Request $request, $pageSize = 3)
        {
            $products = Products::paginate($pageSize);

            return view('products.index', compact('products'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        $brands = Brands::all();
        return view('products.create',compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'description' => 'required|string',
    //         'stock' => 'required|numeric',
    //         'price' => 'required|numeric',
    //         ]);

    //     $product=Products::create([
    //         'name' => $request->input('name'),
    //         'description' => $request->input('description'),
    //         'stock' => $request->input('stock'),
    //         'active' => $request->input('radio') === 'true', // Assume que o valor do rádio é uma string 'true' ou 'false'
    //         'price' => $request->input('price'),   
    //         'brand_id' => $request->input('brand'),
    //         'categories_id' => $request->input('category'), 
    //     ]);
    //     if ($request->has('images')) {
    //         foreach ($request->file('images') as $image) {
    //             $name = $image->getClientOriginalName();
    //             $path = $image->store('public/images');
    
    //             $product->images()->create([
    //                 'name' => $name,
    //                 'path' => $path,
    //             ]);
    //         }
    //     }
    //     return redirect('adminproducts')->with('success', 'Product created successfully');
    // }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'stock' => 'required|numeric',
        'price' => 'required|numeric',
        'images.*' => 'required|image|mimes:png|max:2048', // Validar cada imagem no array
    ]);

    $product = Products::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'stock' => $request->input('stock'),
        'active' => $request->input('radio') === 'true',
        'price' => $request->input('price'),
        'brand_id' => $request->input('brand'),
        'categories_id' => $request->input('category'),
    ]);

    // // Associar imagens ao produto
    // if ($request->has('images')) {
    //     foreach ($request->file('images') as $image) {
    //         $name = $image->getClientOriginalName();
    //         $path = $image->store('public/images');

    //         $product->images()->create([
    //             'name' => $name,
    //             'path' => $path,
    //         ]);
    //     }
    // }

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
        $categories = Categories::all();
        $brands = Brands::all();
        return view('products.edit',compact('product', 'categories', 'brands'));
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
            'brand_id' => $request->input('brand'),
            'categories_id' => $request->input('category'),
        ]);
        // dd($product);
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
