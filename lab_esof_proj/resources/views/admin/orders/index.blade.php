@extends('layouts.app')

@section('title')
    AdminClients
@endsection

@section('content')
<div class="adclientmenu">
    <div class="grid-container">
        <div class="grid-item item2 adclient">
            <div class="sidemenuproduct">
                <a href="{{ route('adminorders') }}">
                    <div class="checkoutinputline active">
                        <h3>Orders<i class="fa-solid fa-box"></i></h3>
                    </div>
                </a>
                <a href="{{ route('adminclients') }}">
                    <div class="checkoutinputline ">
                        <h3>Clients<i class="fa-solid fa-user"></i></h3>
                    </div>
                </a>
                <a href="{{ route('adminproducts') }}">
                    <div class="checkoutinputline">
                        <h3>Products<i class="fa-solid fa-cart-shopping"></i></h3>
                    </div>
                </a>
                <a href="{{ route('adminimages') }}">
                    <div class="checkoutinputline ">
                        <h3>Images<i class="fa-solid fa-image"></i></h3>
                    </div>
                </a>
                <a href="{{ route('adminvouchers') }}">
                    <div class="checkoutinputline">
                        <h3>Vouchers<i class="fas fa-tag"></i></h3>
                    </div>
                </a>
                <a href="{{ route('admincategories') }}">
                    <div class="checkoutinputline">
                        <h3>Categories</h3>
                    </div>
                </a>
                <a href="{{ route('adminbrands') }}">
                    <div class="checkoutinputline">
                        <h3>Brands</h3>
                    </div>
                </a>

            </div>
        </div>
        <div class="grid-item item1 adclient"></div>
        <div class="grid-item item9 adclient">
            <div class="mainmenuclient">
            <div class="upmainmenuproduct">
                <div class="checkoutinputline">
                </div>
            </div>
            <div class="mainmenuproduct">
                <div class="checkoutinputline">
                    <!-- <h3>User</h3> -->
                    <h3>Order Number</h3>
                    <h3>User</h3>
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
                        <h4>{{ $order->user->name}}</h4>
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