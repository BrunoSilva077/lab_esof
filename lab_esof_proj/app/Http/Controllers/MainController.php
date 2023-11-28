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
}
