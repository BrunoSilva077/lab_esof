@extends('layouts.app')

@section('title')
    AdminProducts
@endsection

@section('content')
<div class="adproductmenu">
    <div class="grid-container">
        <div class="grid-item item2 adproduct">
            <div class="sidemenuproduct">
                <a href="{{ route('adminorders') }}">
                    <div class="checkoutinputline">
                        <h3>Orders<i class="fa-solid fa-box"></i></h3>
                    </div>
                </a>
                <a href="{{ route('adminclients') }}">
                    <div class="checkoutinputline">
                        <h3>Clients<i class="fa-solid fa-user"></i></h3>
                    </div>
                </a>
                <a href="{{ route('adminproducts') }}">
                    <div class="checkoutinputline active">
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
            </div>
        </div>
        <div class="grid-item item1 adproduct"></div>
        <div class="grid-item item9 adproduct">
            <div class="upmainmenuproduct">
                <div class="checkoutinputline">
                    <!-- <h3 class="active">All Orders</h3>
                    <h3>Completed</h3>
                    <h3>Pending</h3> -->
                    <div class="btnnewproduct">
                            <a href="{{ route('products.create') }}">
                            <button>New</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mainmenuproduct">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif 
                <div class="checkoutinputline">
                    <h3>Product ID</h3>
                    <h3>Product Name</h3>
                    <h3>Description</h3>
                    <h3>Brand</h3>
                    <h3>Stock</h3>
                    <h3>Price</h3>
                    <h3>Active</h3>
                    <h3>Edit</h3>
                    <h3>Remove</h3>
                </div>
                <hr class="horizontal-adproduct">
                @forelse($products as $product)
                <div class="checkoutinputline">
                    <h4>{{$product->id}}</h4>
                    <h4>{{$product->name}}</h4>
                    <h4>{{$product->description}}</h4>
                    <h4>{{$product->brand->name}}</h4>
                    <h4>{{$product->stock}}</h4>
                    <h4>{{$product->price}}€</h4>
                    @if($product->active)
                        <h4>True</h4>
                    @else
                        <h4>False</h4>
                    @endif
                    <a href="{{ route('products.edit',['product' => $product]) }}">
                    <button>Edit</button>
                    </a>
                    <form action="{{ route('products.destroy',['product' => $product]) }}" method="POST" style="width: 11.1%;">
                    @csrf
                        <button type="submit" style="width:100%">Remove</button>
                    </form>
                    </div>

                @empty
                    <h4>No products found</h4>
                @endforelse    
            </div>
        </div>
    </div>
</div>
@endsection('content')