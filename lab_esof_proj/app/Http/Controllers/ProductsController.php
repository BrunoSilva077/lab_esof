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
    public function index()
    {
        // $products = Products::paginate(2);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
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
