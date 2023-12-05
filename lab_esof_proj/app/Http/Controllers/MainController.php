<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Home() {
        return view('home');
    }

    public function Login() {
        return view('login');
    }

    public function Newsletter() {
        return view('newsletter');
    }
    public function Menucheckout() {
        return view('menu-checkout');
    }
    public function AdminOrders() {
        return view('adminorders');
    }
    public function AdminClients() {
        return view('adminclients');
    }
    public function AdminProducts() {
        return view('adminproducts');
    }
    public function EditProfile() {
        return view('editprofile');
    }
   
}
