@extends('layouts.app')

@section('title')
    Newsletter
@endsection

@section('content')
<div class="grid-container newsletter">
        <div class="grid-item item1 left-side"></div>
        <div class="grid-item item5 img">
            <img src="img/newsletter/newsletter.png" alt="newsletter.png">
        </div>
        <div class="grid-item item6 content">
            <div class="text-email">
                <div class="text">
                    <h2>Subscribe newsleter</h2>
                    <p>Subscribe to our newsletter for exclusive information on our Events, Promotions and Offers.</p>
                </div>
                <div class="email-field">
                    <div class="email-button">
                        <input type="text" placeholder="Email*">
                        <button type="submit">Subscribe</button>
                    </div>
                    <p>* Required field</p>
                </div>
            </div>

        </div>

</div>



@endsection