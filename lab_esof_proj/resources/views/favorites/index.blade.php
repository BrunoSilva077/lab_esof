@extends('layouts.app')

@section('title')
    Favorites Profile
@endsection

@section('content')
<div class="editprofilemenu">
    <div class="grid-container">
        <div class="grid-item item3 menuedit">
            <div class="sidemenuedit">
                <div class="profileinputline">
                    <a href=""><h3>Account<i class="fa-solid fa-box" style="opacity:1.0;"></i></h3></a>
                </div>
                <div class="profileinputline active">
                    <a href=""><h3>Favorites<i class="fa-solid fa-heart"></i></h3></a>
                </div>
                <div class="profileinputline">
                    <a href=""><h3>History<i class="fa-solid fa-clock-rotate-left"></i></h3></a>
                </div>
            </div>
        </div>
        <div class="grid-item item9 menuedit">
            <div class="mainmenuedit">
            <div class="all-prod">
                @forelse($favoritos as $product)
                        <div class="each-prod">
                            <div class="fav-prod">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <div class="img-prod">
                    
                            </div> 
                            
                            <div class="text-prod">
                                {{ $product->name }}
                            </div>
                            <div class="prec-prod">
                                {{ $product->price }}€
                            </div>
                                @if ($product->active)
                                    <div class="stock-prod in-stock">
                                    <i class="fa-solid fa-circle-check"></i>In Stock
                                    </div>
                                @else
                                    <div class="stock-prod no-stock">
                                    <i class="fa-solid fa-times-circle"></i>Out of Stock
                                    </div>
                                @endif
                            </div>
                    @empty
                    <div class="alert alert-danger">
                        No products found.
                    </div>
                @endforelse 
            
             <!-- <div class="each-prod">
                <div class="fav-prod">
                    <i class="fa-solid fa-xmark"></i>
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="img-prod">
                    <img src="img/products/iphone14.jpg">
                </div> 
                
                <div class="text-prod">
                    Iphone 14
                </div>
                <div class="precfrab-prod">
                    PVPR: 899€
                </div>
                <div class="prec-prod">
                    699.99€
                </div>
                <div class="stock-prod">
                    <i class="fa-solid fa-circle-check"></i>In Stock
                </div>
            </div> -->

        </div> 
        
            </div>
        </div>
    </div>
</div>
@endsection('content')