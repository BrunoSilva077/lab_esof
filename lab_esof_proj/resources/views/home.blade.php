@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="wrapper">
        <section>
            <div class="grid-container">
                <div class="grid-item item1 slider">
                    <div class="slideshow-container">
                        <div class="mySlides fade">
                            <div class="text">
                                Unleash Innovation with your New iPhone.
                            </div>
                            <img src="{{ asset('img/iphone14/imagem_iphone14_00.png') }}" style="width:50%">
                            <button class="buy-now">Buy now</button>
                        </div>
                    
                    </div>
                    <div class="tracos-slideshow">
                        <span class="dot"></span>  <!--onclick="currentSlide(1)" -->
                        <span class="dot"></span> 
                        <span class="dot"></span> 
                    </div>
                </div>
                <div class="grid-item item2">2</div>
                <div class="grid-item item3">3</div>
                <div class="grid-item item4">4</div>
                <div class="grid-item item5">5</div>
                <div class="grid-item item6">6</div>
                <div class="grid-item item7">7</div>
                <div class="grid-item item8">8</div>
                <div class="grid-item item9">9</div>
                <div class="grid-item item10">10</div>
                <div class="grid-item item11">11</div>
                <div class="grid-item item12">12</div> 
            </div>
        </section>
    </div>
@endsection