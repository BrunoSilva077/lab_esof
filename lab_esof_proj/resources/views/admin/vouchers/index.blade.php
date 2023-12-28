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
                <div class="checkoutinputline">
                    <h3>Clients<i class="fa-solid fa-user"></i></h3>
                </div>
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
            </div>
        </div>
        <div class="grid-item item1 adproduct"></div>
        <div class="grid-item item9 adproduct">
            <div class="upmainmenuproduct">
                <div class="checkoutinputline">
                    <h3 class="active">All Orders</h3>
                    <h3>Completed</h3>
                    <h3>Pending</h3>
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
                    <h3>Tipo Percentual</h3>
                    <h3></h3>
                    <h3></h3>
                </div>
                <hr class="horizontal-adproduct">
                @forelse($vouchers as $voucher)
                <div class="checkoutinputline">
                    <h4>{{$voucher->id}}</h4>
                    <h4>{{$voucher->cod_voucher}}</h4>
                    <h4>{{$voucher->tipo_percentual}}</h4>
                    <h4>{{$voucher->valor_desconto}}</h4>
                    <a href="{{ route('editvoucher', ['voucher' => $voucher]) }}" class="a_voucher">
                        <button class="but_voucher">Edit</button>
                    </a> 
                    <button>Remove</button>
                    </div>

                @empty
                    <h4>No products found</h4>
                @endforelse    
            </div>
        </div>
    </div>
</div>
@endsection('content')