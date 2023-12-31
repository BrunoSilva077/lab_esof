<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Images;


class AdminController extends Controller
{
    public function listProducts()
    {
        $products = Products::withTrashed()->orderBy('id')->get();
        return view('admin.products.index', compact('products'));
    }

    public function listUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edituser(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateuser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'string',
            'birthday' => 'date',
            'email' => 'string',
            // Adicione outras regras de validação conforme necessário
        ]);
    
        $user->update([
            'name' => $request->input('name'),
            'birthday' => $request->input('birthday'),
            'email' => $request->input('email'),
            'gender' => $request->input('gender') === 'true',
        ]);
        return back()->with('success', 'User updated successfully');
    }
    public function listImages(){
        $images = Images::all();
        return view('admin.images.index', compact('images'));
    }
    // public function listOrders()
    // {
    //     $orders = Order::all();
    //     return view('admin.orders.index', compact('orders'));
    // }
}
