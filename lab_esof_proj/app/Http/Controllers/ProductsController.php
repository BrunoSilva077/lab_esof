<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Favorito;
use Illuminate\Support\Facades\Auth;
use CarrinhoDeCompras\Cart;
class ProductsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(/*$pageSize = 3*/)
    {
        // $products = Products::paginate($pageSize);
        $products = Products::all();
        if(Auth::user()){
            $favoritos = Auth::user()->favorito;
            return view('products.index', compact('products','favoritos'));
        }
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
    public function store(Request $request){
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


    return redirect('adminproducts')->with('success', 'Product created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        if(Auth::user()){
            $favoritos = Auth::user()->favorito;
            return view('products.show', compact('product','favoritos'));
        }
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
        $randomProducts = Products::inRandomOrder()->limit(3)->get();

        return view('home', compact('randomProducts'));
    }
}
