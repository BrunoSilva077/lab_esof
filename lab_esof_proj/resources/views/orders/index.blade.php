@extends('layouts.app')

@section('title')
    AdminProducts
@endsection

@section('content')
<div class="adproductmenu">
    <div class="grid-container">
        <div class="grid-item item2 adproduct"></div>
        <div class="grid-item item1 adproduct"></div>
        <div class="grid-item item9 adproduct">
            <div class="upmainmenuproduct">
                <div class="checkoutinputline">
                </div>
            </div>
            <div class="mainmenuproduct">
                <div class="checkoutinputline">
                    <!-- <h3>Product ID</h3>
                    <h3>Product Name</h3>
                    <h3>Description</h3>
                    <h3>Brand</h3>
                    <h3>Stock</h3>
                    <h3>Price</h3>
                    <h3>Active</h3>
                    <h3>Edit</h3>
                    <h3>Remove</h3> -->
                </div>
                <hr class="horizontal-adproduct">
                @forelse($orders as $order)
                <div class="checkoutinputline">
                    <h4>{{$product->id}}</h4>
                    <h4>{{$product->name}}</h4>
                    <h4>{{$product->description}}</h4>
                    @if($product->brand_id == null)
                        <h4>None</h4>
                    @else
                    <h4>{{$product->brand->name}}</h4>
                    @endif
                    <h4>{{$product->stock}}</h4>
                    <h4>{{$product->price}}€</h4>
                    @if($product->active)
                        <h4>True</h4>
                    @else
                        <h4>False</h4>
                    @endif
                    @if($product->trashed())
                        <a style="visibility:hidden;">
                            <button></button>
                        </a>
                        <form action="{{ route('products.restore',['product' => $product]) }}" method="POST" style="width: 11.1%;">
                        @csrf
                            <button type="submit" style="width:100%">Restore</button>
                        </form>
                    @else
                        <a href="{{ route('products.edit',['product' => $product]) }}">
                            <button>Edit</button>
                        </a>
                        <form action="{{ route('products.destroy',['product' => $product]) }}" method="POST" style="width: 11.1%;">
                        @csrf
                            <button type="submit" style="width:100%">Remove</button>
                        </form>
                    @endif
                    </div>
                @empty
                    <h4>No products found</h4>
                @endforelse
                <form action="{{ route('generate-pdf') }}"style="width: 11.1%;">
                        @csrf
                        <button type="submit" style="width:100%">PDF</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection('content')