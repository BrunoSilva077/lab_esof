@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
<div class="adproductmenu">
    <div class="grid-container">
        <div class="grid-item item2 adproduct">
            <div class="sidemenuproduct">
                <a href="{{ route('adminclients') }}">
                    <div class="checkoutinputline">
                        <h3>Orders<i class="fa-solid fa-box"></i></h3>
                    </div>
                </a>
                <div class="checkoutinputline active">
                    <h3>Clients<i class="fa-solid fa-user"></i></h3>
                </div>
                <a href="{{ route('adminproducts') }}">
                    <div class="checkoutinputline">
                        <h3>Products<i class="fa-solid fa-cart-shopping"></i></h3>
                    </div>
                </a>
                <a href="{{ route('adminvouchers') }}">
                    <div class="checkoutinputline">
                        <h3>Vouchers<i class="fa-solid"></i></h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item item1 adproduct"></div>
        <div class="grid-item item9 adproduct">
            <div class="upmainmenuproduct">
                <div class="checkoutinputline">
                    <h3 class="active">All Orders</h3>
                    <h3>Completed</h3>
                    <h3>Pending</h3>
                    <div class="btnnewproduct">
                        <button>New</button>
                    </div>
                </div>
            </div>
            <div class="mainmenuproduct">
                <div class="checkoutinputline">
                    <h3>#</h3>
                    <h3>Order ID</h3>
                    <h3>Product Name</h3>
                    <h3>Address</h3>
                    <h3>Date</h3>
                    <h3>Price</h3>
                    <h3>Status</h3>
                    <h3>Edit</h3>
                    <h3>Remove</h3>
                </div>
                <hr class="horizontal-adproduct">
                @forelse($products as $product)
                <div class="checkoutinputline">
                    <h4>{{$product->id}}</h4>
                    <h4>{{$product->id}}</h4>
                    <h4>{{$product->name}}</h4>
                    <h4>{{$product->description}}</h4>
                    <h4>{{$product->stock}}</h4>
                    <h4>{{$product->price}}</h4>
                    <h4>{{$product->active}}</h4>
                    <button>Edit</button>
                    <button>Remove</button>
                    </div>

                @empty
                    <h4>No products found</h4>
                @endforelse    
            </div>
        </div>
    </div>
</div>
@endsection('content')