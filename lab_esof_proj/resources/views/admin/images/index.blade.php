@extends('layouts.app')

@section('title')
    AdminImages
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
                <div class="checkoutinputline active">
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
        <div class="grid-item item1 adproduct"></div>
        <div class="grid-item item9 adproduct">
            <div class="upmainmenuproduct">
                <div class="checkoutinputline">
                    <div class="btnnewproduct">
                            <a href="{{ route('partials.create') }}">
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach 
                        </ul>
                </div>
            @endif
                <div class="checkoutinputline">
                    <h3></h3>
                    <h3>Image ID</h3>
                    <h3>Image Name</h3>
                    <h3>Image Path</h3>
                    <h3>Product Associated</h3>
                    <h3>Image</h3>
                    <h3>Edit</h3>
                    <h3>Remove</h3>
                    <h3></h3>
                </div>
                <hr class="horizontal-adproduct">
                @forelse($images as $image)
                <div class="checkoutinputline img_edit">
                    <h4>{{ $image->id }}</h4>
                    <h4>{{ $image->name }}</h4>
                    <h4>{{ $image->path }}</h4>
                    @if( $image->product_id  == null )
                        <h4>None</h4>
                    @else
                    <h4>{{ $image->product->name }}</h4>
                    @endif
                    <img src="{{ asset('storage/images/' . $image->path) }}" alt="{{ $image->name }}">
                    <a href="{{ route('partials.edit',['image' => $image]) }}">
                    <button>Edit</button>
                    </a>
                    <form action="{{ route('partials.destroy', ['image' => $image]) }}" method="POST"  style="width:11.1%;">
                        @csrf
                        <button type="submit" style="width:100%;">Remove</button>
                    </form>
                    <!-- <button>Remove</button> -->
                    </div>

                @empty
                    <h4>No products found</h4>
                @endforelse    
            </div>
        </div>
    </div>
</div>
@endsection('content')