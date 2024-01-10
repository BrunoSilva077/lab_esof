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
                    <div class="checkoutinputline">
                        <h3>Images<i class="fa-solid fa-image"></i></h3>
                    </div>
                </a>
                <a href="{{ route('adminvouchers') }}">
                    <div class="checkoutinputline active">
                        <h3>Vouchers<i class="fa-solid"></i></h3>
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
                    <!-- <h3 class="active">All Orders</h3>
                    <h3>Completed</h3>
                    <h3>Pending</h3> -->
                    <div class="btnnewproduct">
                    <a href="{{ route('create') }}">
                        @csrf
                        <button type="submit" class="but_voucher">New</button>
                    </a>
                    </div>
                </div>
            </div>
            <div class="mainmenuproduct">
                <div class="checkoutinputline">
                    <h3>#</h3>
                    <h3>Cod Voucher</h3>
                    <h3>Valor Desconto</h3>
                    <h3>Tipo Desconto</h3>
                    <h3>Edit</h3>
                    <h3>Remove</h3>
                </div>
                <hr class="horizontal-adproduct">
                @forelse($vouchers as $voucher)
                <div class="checkoutinputline">
                    <h4>{{$voucher->id}}</h4>
                    <h4>{{$voucher->cod_voucher}}</h4>
                    <h4>{{$voucher->valor_desconto}}</h4>
                    <!-- <h4>{{$voucher->tipo_percentual}}</h4> -->
                    @if($voucher->tipo_percentual )
                        <h4>Percentagem</h4>
                    @else
                        <h4>Valor</h4>
                    
                    @endif
                    <a href="{{ route('editvoucher', ['voucher' => $voucher]) }}" class="a_voucher">
                        <button class="but_voucher">Edit</button>
                    </a> 
                    @if($voucher->trashed())
                        <a style="visibility:hidden;">
                            <button></button>
                        </a>
                        <form action="{{ route('vouchers.restore',['voucher' => $voucher]) }}" method="POST" style="width: 11.1%;">
                        @csrf
                            <button type="submit" style="width:100%">Restore</button>
                        </form>
                    @else
                        <a href="{{ route('editvoucher', ['voucher' => $voucher]) }}" class="checkoutinputline" style="text-decoration: none;">
                            <!-- Edit</a> -->
                            <button style="width:100%">Edit</button>
                        </a>
                        <form action="{{ route('users.destroy',['user' => $user]) }}" method="POST" style="width: 11.1%;">
                        @csrf
                            <button type="submit" style="width:100%">Remove</button>
                        </form>
                    @endif
                    </div>

                @empty
                    <h4>No products found</h4>
                @endforelse    
            </div>
        </div>
    </div>
</div>
@endsection('content')