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
        $imagePath = str_replace(url('/'), '', $request->image);
        //   dd($imagePath);
        $cart= Cart::instance('shopping')
        ->add($request->id, 
        $request->name, 
        $request->quantity,
        $request->price,
        ['image'=>$imagePath,'totalPrice'=>$request->price*$request->quantity]);

        // dd($cart);
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
    public function update(Request $request, string $rowId)
    {
        $cart = Cart::instance('shopping');
        $cartItem = $cart->get($rowId);
        // dd($cartItem);
    
        // Verifique se o item existe no carrinho
        if ($cartItem) {
            // Atualize a quantidade
            $cart->update($rowId, $request->quantity);
    
            // Recalcule o preço total com base na nova quantidade
            $newTotalPrice = $cartItem->price * $request->quantity;    
    
            $options['image'] = $cartItem->options->image;
            // Atualize a variável totalPrice nas opções
            $options['totalPrice'] = $newTotalPrice;
            // dd($options);

            // Atualize o item no carrinho com as novas opções
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
