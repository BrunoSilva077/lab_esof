@extends('layouts.app')

@section('title')
    CreateProduct
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
                <form action=" {{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="profileinputline">
                        <h2>Product</h2>
                    </div>
                    <div class="profileinputline">
                        <h3>Name</h3>
                        <input type="text" name="name" value="{{ old('name') }}">              
                    </div>
                    <div class="profileinputline">
                    <h3>Description</h3>
                    <textarea name="description" cols="32" rows="10" class="create-prod" maxlength="200">{{ old('description') }}</textarea>
                    </div>
                    <div class="profileinputline">
                    <h3>Stock</h3>
                    <input type="text" name="stock" value="{{ old('stock') }}">
                    </div>
                    <div class="profileinputline">
                        <h3><label for="brands">Brand</label></h3>
                        <select id="brand" name="brand" class="category">
                            <option value="" selected disabled>Select a brand</option>
                            @foreach ($brands  as $brand)
                                <option value="{{ $brand->id }}">
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="profileinputline">
                        <h3><label for="categories">Categorie</label></h3>
                        <select id="category" name="category" class="category">
                            <option value="" selected disabled>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="profileinputline">
                    <h3>Preco</h3>
                    <input type="text" name="price" value="{{ old('price') }}">
                    </div>
                    
                    <div class="profileinputline radio">
                        <h3>Active</h3>
                        <input type="radio" name="radio" class="sizeradio" value="true">True
                        <div class="space"></div>
                        <input type="radio" name="radio" class="sizeradio" value="false">False
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
@endsection