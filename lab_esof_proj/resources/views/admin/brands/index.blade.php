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
                    <div class="checkoutinputline active">
                        <h3>Brands</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="grid-item item1 adproduct"></div>
        <div class="grid-item item9 adproduct">
            <div class="upmainmenuproduct">
                <div class="checkoutinputline">
                    <div class="btnnewproduct">
                            <a href="{{ route('brands.create') }}">
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
                    <h3></h3>
                    <h3></h3>
                    <h3></h3>
                    <h3>Brand ID</h3>
                    <h3>Brand Name</h3>
                    <h3>Edit</h3>
                    <h3>Remove</h3>
                    <h3></h3>
                    <h3></h3>
                    <h3></h3>
                </div>
                <hr class="horizontal-adproduct">
                @forelse($brands as $brand)
                <div class="checkoutinputline">
                    <h4>{{$brand->id}}</h4>
                    <h4>{{$brand->name}}</h4>
                    <a href="{{ route('brands.edit',['brands' => $brand]) }}">
                        <button>Edit</button>
                    </a>
                    <form action="{{ route('brands.destroy',['brands' => $brand]) }}" method="POST" style="width: 11.1%;">
                        @csrf
                        @method('post')
                        <button type="submit" style="width: 100%;">Remove</button>
                    </form>
                </div>
                @empty
                    <h4>No brands found</h4>
                @endforelse    
            </div>
        </div>
    </div>
</div>
@endsection('content')