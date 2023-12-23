<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
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
        $cart= Cart::instance('shopping')->add($request->id, $request->name, $request->quantity,$request->price*$request->quantity,['totalQty'=>$request->quantity,'img'=>$request->image]) ->associate('App\Models\Products');
        // dd($cart);

        return back()->with('Sucess','Product added to cart sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cartItems = Cart::content();
        return view('includes.navbarAdmin', compact('cartItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
