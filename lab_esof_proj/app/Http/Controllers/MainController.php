<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Newsletter() {
        return view('newsletter');
    }

    public function About() {
        return view('about');
    }

    public function Contact() {
        return view('contact');
    }
}
