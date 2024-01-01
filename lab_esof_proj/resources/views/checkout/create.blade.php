@extends('layouts.app')

@section('title')
    Menu Checkout
@endsection

@section('content')
<div class="checkoutmenu">
    <div class="grid-container">
        <div class="grid-item item2 checkout"></div>
        <div class="grid-item item4 checkout">
            <div class="menu1">
                <h1>Delivery Options</h1>
                    <div class="inputsdelivery"><!--Depois meter os required e meter form tb-->
                        <input type="text" placeholder="Address" id="address" >
                        <div class="checkoutinputline">
                            <input type="text" placeholder="Post code" id="pcode" >
                            <input type="text" placeholder="Village/City" id="VillCity" >
                        </div>
                        <input type="text" placeholder="Country/Region" id="ContRegion" >
                        <input type="text" placeholder="Voucher" id="voucher" >
                        <br>
                        <form action="/session" method="POST">
                        @csrf
                            <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Go back</a>
                        @forelse($cart_products as $product)
                            <input type='hidden' name="rowIds[]" value="{{$product->rowId}}">
                            <input type='hidden' name="totals[]" value="{{$product->price}}">
                            <input type='hidden' name="qtys[]" value="{{$product->qty}}">
                            <input type='hidden' name="voucher_code" value="ric">
                            <input type='hidden' name="productnames[]" value="{{$product->name}}">
                            @empty
                            <p>O carrinho está vazio.</p>
                            <!-- Handle the case where there are no cart products -->
                        @endforelse
                            <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                        </form>
                    </div>
            </div>
        </div>
        <div class="grid-item item1 checkout"></div>
        <div class="grid-item item3 checkout">
            <div class="menu2">
                <div class="checkoutinputline"> 
                    <h1 class="inyourbag">In Your Bag</h1>
                    <h1 class="editproduct">Edit</h1>
                </div>
                @forelse($cart_products as $product)
                <div class="contentyourbag">
                    <!-- <div class="checkoutinputline"> 
                        <h4 class="Subtotal">Subtotal</h4>
                        <h4 class="preco">€90,00</h4>
                    </div> -->
                    <!-- <div class="checkoutinputline"> 
                        <h4 class="EstShip">Estimated Shipping</h4>
                        <h4 class="preco">€90,00</h4>
                    </div> -->
                    <!-- <div class="checkoutinputline"> 
                        <h4 class="EstTax">Estimated Tax</h4>
                        <h4 class="preco">€90,00</h4>
                    </div> -->
                
                    <!-- <h3 class="arrivesDate">Arrives by Mon, Nov 27</h3> -->
                    <div class="checkoutinputline img_edit">
                    @if ($product->options->has('image'))
                                <img src="{{ asset($product->options->get('image')) }}" alt="{{ $product->name }}">
                            @else
                                <img src="img/product/default_image.jpg" alt="{{ $product->name }}">
                            @endif   
                        <div class="classcolumn">
                            <h2 class="info">{{$product->name}}</h2>
                            <h3 class="info" style="color: #C0BCBC">{{$product->qty}}</h3>
                            <h3 class="info" style="color: #C0BCBC">{{$product->price}}€</h3>
                        </div>
                    </div>
                </div>
                @empty
                <p>O carrinho está vazio.</p>
                @endforelse
                <div class="checkoutinputline" style="color:white;"> 
                    <h4 class="Total">Total</h4>
                    <h4 class="preco">{{$totalPrice}}€</h4>
                </div>
            </div>
        </div>
        <div class="grid-item item1"></div>
    </div>
</div>
<script src="{{ asset('js/checkoutmenu.js') }}"></script>
@endsection('content')