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
}
