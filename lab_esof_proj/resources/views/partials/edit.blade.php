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
                        <input type="text" name="product" value="{{ $image->product->name }}">              
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