@extends('layouts.app')

@section('title')
    Newsletter
@endsection

@section('content')
<div class="container-newsletter">
        <div class="background-newsletter">      
            <div class="grid-container">   
            <div class="grid-item item1">1</div>
            <div class="grid-item item2">
                <img src="{{ asset('img/newsletter/newsletter.png') }}" style="width:100%">
            </div> 
            <div class="grid-item item3">3</div>
            <div class="grid-item item4">4</div>
            <div class="grid-item item5">5</div>
            <div class="grid-item item6">6</div>
            <div class="grid-item item7">
                <div class="text">
                    <h1>Newsletter</h1>
                    <p>Subscribe to our newsletter for exclusive information on our Events, Promotions and Offers.</p>
                    <form action="">
                        <input type="email" placeholder="Email*" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="grid-item item8">8</div>
            <div class="grid-item item9">9</div>
            <div class="grid-item item10">10</div>
            <div class="grid-item item11">11</div>
            <div class="grid-item item12">12</div>
    </div></div>
  
</div>


@endsection