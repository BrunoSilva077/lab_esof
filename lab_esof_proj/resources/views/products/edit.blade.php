@extends('layouts.app')

@section('title')
    EditProduct
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
                <form action=" {{ route('products.update', ['product' => $product]) }}" method="POST">
                    @csrf
                    <div class="profileinputline">
                        <h2>Product</h2>
                    </div>
                    <div class="profileinputline">
                        <h3>Brand</h3>
                        <input type="text" name="name" value="{{ $product->brand->name }}" disabled>              
                    </div>
                    <div class="profileinputline">
                        <h3>Categorie</h3>
                        <input type="text" name="name" value="{{ $product->categorie->name }}" disabled>              
                    </div>
                    <div class="profileinputline">
                        <h3>Last update</h3>
                        <input type="text" name="name" value="{{ $product->updated_at }}" disabled>              
                    </div>
                    <div class="profileinputline">
                        <h3>Name</h3>
                        <input type="text" name="name" value="{{ $product->name }}">              
                    </div>
                    <div class="profileinputline">
                    <h3>Description</h3>
                    <!-- <input type="text" name="description" value="{{  $product->description }}"> -->
                    <textarea name="description" cols="32" rows="10">{{  $product->description }}</textarea>
                    </div>
                    <div class="profileinputline">
                    <h3>Stock</h3>
                    <input type="text" name="stock" value="{{  $product->stock }}">
                    </div>
                    <div class="profileinputline">
                    <h3>Preco</h3>
                    <input type="text" name="price" value="{{  $product->price }}">
                    </div>
                    <div class="profileinputline radio">
                        <h3>Active</h3>
                        <input type="radio" name="radio" class="sizeradio" value="true"{{  $product->active === true ? 'checked' : '' }}>True
                        <div class="space"></div>
                        <input type="radio" name="radio" class="sizeradio" value="false"{{ $product->active === false ? 'checked' : '' }}>False
                    </div>
                    <div class="profileinputline">
                        <h3>Images</h3>
                    @if ($product->images->count() > 0)
                        @foreach($product->images as $image)
                        <a class="fancybox" data-fancybox="gallery" href="{{ asset($image->path) }}">
                            <div class="main-image img_edit">
                                <img src="{{ asset($image->path) }}" alt="{{ $image->name }}">
                            </div>
                        </a>
                        @endforeach
                    @else
                        <img src="img/products/default_image.jpg" alt="{{ $product->name }}">
                    @endif  
                    </div>
                    <div class="profileinputline">
                        <button class="btnsave">Save</button>
                    </div>
                    <hr class="horizontal-menuedit">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection('content')