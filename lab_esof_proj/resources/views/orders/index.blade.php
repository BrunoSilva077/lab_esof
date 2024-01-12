@extends('layouts.app')

@section('title')
    UserOrders
@endsection

@section('content')
<div class="adproductmenu">
    <div class="grid-container">
        <div class="grid-item item2 menuedit">
        <div class="sidemenuedit">
                <div class="profileinputline">
                    <a href="{{ route('editprofile', ['user' => auth()->user()]) }}"><h3>Account<i class="fa-solid fa-box" style="opacity:1.0;"></i></h3></a>
                </div>
                <div class="profileinputline">
                    <a href="{{ route('listarfavoritos', ['user' => auth()->user()]) }}"><h3>Favorites<i class="fa-solid fa-heart"></i></h3></a>
                </div>
                <div class="profileinputline active">
                    <a href="{{ route('userorder', ['user' => auth()->user()]) }}"><h3>History<i class="fa-solid fa-clock-rotate-left"></i></h3></a>
                </div>
            </div>
            </div>

        <div class="grid-item item1 adproduct"></div>
        <div class="grid-item item9 adproduct">
            <div class="upmainmenuproduct">
                <div class="checkoutinputline">
                </div>
            </div>
            <div class="mainmenuproduct">
                <div class="checkoutinputline">
                    <h3>Order Number</h3>
                    <h3>Address</h3>
                    <h3>Post Code</h3>
                    <h3>City</h3>
                    <h3>Country</h3>
                    <h3>Products</h3>
                    <h3>Quantity</h3>
                    <h3>Total</h3>
                    <h3>PDF</h3>
                </div>
                <hr class="horizontal-adproduct">
                @forelse($orders as $order)
                    <div class="checkoutinputline">
                        <h4>{{ $order->id }}</h4>
                        <h4>{{ $order->address }}</h4>
                        <h4>{{ $order->post_code }}</h4>
                        <h4>{{ $order->city }}</h4>
                        <h4>{{ $order->country }}</h4>
                        <ul>
                            @foreach (json_decode($order->productnames, true) as $productName)
                                <li>{{ $productName }}</li>
                            @endforeach
                        </ul>
                        <h4>{{ $order->quantity }}</h4>
                        <h4>{{ $order->total }}€</h4>
                        <form action="{{ route('generate-pdf') }}" style="width: 11.1%;">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <button type="submit" style="width:100%">Generate PDF</button>
                        </form>
                    </div>
                @empty
                    <h4>No orders found</h4>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection('content')