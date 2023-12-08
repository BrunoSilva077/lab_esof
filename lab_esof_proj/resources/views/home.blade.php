@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="wrapper">
        <section>
            <div class="grid-container">
                <div class="grid-item item12 home">
                <div class="slideshow-container">
                    <div class="slide fade">
                        <img src="img/products/iphone14.jpg" alt="Imagem 1">
                    </div>
                    <div class="slide fade">
                    <img src="img/products/iphone14.jpg" alt="Imagem 2">
                    </div>
                    <div class="slide fade">
                    <img src="img/products/iphone14.jpg" alt="Imagem 3">
                    </div>
                    <a class="prev" onclick="plusSlides(1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(-1)">&#10095;</a>
                    <div style="text-align:center">
                        <span class="trace" onclick="currentSlide(1)"></span>
                        <span class="trace" onclick="currentSlide(2)"></span>
                        <span class="trace" onclick="currentSlide(3)"></span>
                    </div>
                </div>
                <br>
                <div class="checkoutinputline">
                        <hr class="linhahome">
                        <hr class="linhahome2">
                    </div>
                </div>
            </div>
        </section>
    </div>
<script src="{{ asset('js/slideshow.js') }}"></script>
@endsection