<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Favorito;
use Illuminate\Support\Facades\Auth;
use CarrinhoDeCompras\Cart;
use App\Models\Categories;
use App\Models\Brands;
use App\Models\Images;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $products = Products::paginate(3);
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
        // 'image' => 'required|image|mimes:png|max:2048',
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


        // $name = $request->file('image')->getClientOriginalName();
        // // $request->file('image')->store('public/images');
        // $storedPath = $request->file('image')->storeAs('public/images', $name);
    
        // if ($storedPath) {
        //     $fullPath = Storage::url($storedPath);

        //     $product->images()->create([
        //         'name' => $name,
        //         'path' => $fullPath,  // Use o caminho retornado pela função store
        //         'product_id' => $product->id,
        //     ]);
        
        //     return redirect('adminproducts')->with('success', 'Product created successfully');
        // } else {
        //     // Lida com o erro de armazenamento
        //     return redirect()->back()->with('error', 'Failed to store the image');
        // }



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
        return redirect('adminproducts')->with('success', 'Product updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {



            if (Products::find($product->id)) {
              
                Images::where('product_id', $product->id)->update(['product_id' => null]);
    

                $product->delete();
    
                return back()->with('success', 'Product removed successfully');
            } else {
                return back()->with('error', 'Product does not exist');
            }

    }
    public function restore(Products $product)
    {
        $product->restore();
        return back()->with('success', 'Product restores successfully');
    }
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string'
        ]);
        $search = $request->input('search');
        $products = Products::whereRaw('lower("name") like ?', ['%' . strtolower($search) . '%'])
        ->whereNull('deleted_at')
        ->paginate(3);
        
        if(Auth::user()){
        $favoritos = Auth::user()->favorito;
        return view('products.index', compact('products','favoritos'));
        }

        return view('products.index', compact('products'));
    }

    public function slideshow(Request $request){
        $randomProducts = Products::inRandomOrder()->limit(3)->get();

        return view('home', compact('randomProducts'));
    }
}
