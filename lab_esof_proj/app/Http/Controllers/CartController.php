<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Ramsey\Uuid\Type\Integer;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cartItems = Cart::instance('shopping')->content();
        // dd($cartItems);
        // return view('includes.navbarAdmin', compact('cartItems'));
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
        //  dd($cart);
        $rowId = $cart->rowId;
        return back()->with('Sucess','Product added to cart sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
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
    public function update(Request $request,string $rowId)
    {
        $cart = Cart::instance('shopping');
        $cart->update($rowId, $request->quantity); // Will update the quantity
        return back()->with('success', 'Product removed successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $rowId)
    {
        $cart = Cart::instance('shopping');
        $cart->remove($rowId);
        return back()->with('success', 'Product removed successfully');
    }
}
