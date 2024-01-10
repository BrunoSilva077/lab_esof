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
        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = str_replace(url('/'), '', $request->image);
        $cart= Cart::instance('shopping')
        ->add($request->id, 
        $request->name, 
        $request->quantity,
        $request->price,
        ['image'=>$imagePath,'totalPrice'=>$request->price*$request->quantity]);
        return back()->with('Sucess','Product added to cart sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return back();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $rowId)
    {
        $cart = Cart::instance('shopping');
        $cartItem = $cart->get($rowId);    

        if ($cartItem) {
            $cart->update($rowId, $request->quantity);
    
            $newTotalPrice = $cartItem->price * $request->quantity;    
    
            $options['image'] = $cartItem->options->image;

            $options['totalPrice'] = $newTotalPrice;

            $cart->update($rowId, [
                'options' => $options,
            ]);

            return back()->with('success', 'Product updated successfully');
        }
    
        return back()->with('error', 'Product not found in the cart');
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