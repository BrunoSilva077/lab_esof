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
        $products = Products::all();
        return view('admin.products.index', compact('products'));
    }

    public function listUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // public function listOrders()
    // {
    //     $orders = Order::all();
    //     return view('admin.orders.index', compact('orders'));
    // }

    public function listImages(){
        $images = Images::all();
        return view('admin.images.index', compact('images'));
    }
}
