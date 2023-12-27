<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Login() {
        return view('login');
    }
    public function Register() {
        return view('register');
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
    public function Favprofile() {
        return view('favoritos/favprofile');
    }
    public function Historyprofile() {
        return view('historyprofile');
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

    public function AdminVouchers() {
        return view('adminvouchers');
    }

    public function AdminVouchersEdit() {
        return view('editvoucher');
    }


}
