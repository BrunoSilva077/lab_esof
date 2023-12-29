@extends('layouts.app')

@section('title')
    EditImage
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
                <div class="checkoutinputline active">
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
        <div class="grid-item item9 menuedit">
            <div class="mainmenuedit">
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
                <form action=" {{ route('partials.update', ['image' => $image]) }}" method="POST">
                    @csrf
                    <div class="profileinputline">
                        <h2>Image</h2>
                        <a class="fancybox" data-fancybox="gallery" href="{{ asset($image->path) }}">
                            <div class="main-image img_edit">
                                <img src="{{ asset($image->path) }}" alt="{{ $image->name }}">
                            </div>
                        </a>                 
                    </div>
                    <div class="profileinputline">
                        <h3>Last update</h3>
                        <input type="text" name="updated" value="{{ $image->updated_at }}" disabled>              
                    </div>
                    <div class="profileinputline">
                        <h3>Name</h3>
                        <input type="text" name="name" value="{{ $image->name }}">              
                    </div>
                    <div class="profileinputline">
                        <h3>Product Associated</h3>
                        <select id="product" name="product" class="category">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $image->product_id == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="profileinputline">
                        <button class="btnsave">Save</button>
                    </div>
                    <!-- <hr class="horizontal-menuedit"> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection('content')