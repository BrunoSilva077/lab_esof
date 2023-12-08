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


    public function About() {
        return view('about');
    }

    public function Contact() {
        return view('contact');
    }

    public function products() {
        return view('products');
    }

    public function ProductPage() {
        return view('productPage');
    }
    public function Footer() {
        return view('footer');
    }
    public function Menucheckout() {
        return view('menu-checkout');
    }
    public function Editprofile() {
        return view('editprofile');
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
}
