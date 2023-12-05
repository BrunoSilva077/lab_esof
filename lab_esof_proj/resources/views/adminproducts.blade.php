@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
<div class="adproductmenu">
    <div class="grid-container">
        <div class="grid-item item2 adproduct">
            <div class="sidemenuproduct">
                <div class="checkoutinputline">
                    <h3>Orders<i class="fa-solid fa-box" style="opacity:1.0;"></i></h3>
                </div>
                <div class="checkoutinputline">
                    <h3>Clients<i class="fa-solid fa-user"></i></h3>
                </div>
                <div class="checkoutinputline active">
                    <h3>Products<i class="fa-solid fa-cart-shopping"></i></h3>
                </div>
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
                        <button>New</button>
                    </div>
                </div>
            </div>
            <div class="mainmenuproduct">
                <div class="checkoutinputline">
                    <h3>#</h3>
                    <h3>Order ID</h3>
                    <h3>Product Name</h3>
                    <h3>Address</h3>
                    <h3>Date</h3>
                    <h3>Price</h3>
                    <h3>Status</h3>
                    <h3>Edit</h3>
                    <h3>Remove</h3>
                </div>
                <hr class="horizontal-adproduct">
                <div class="checkoutinputline">
                    <h4>1</h4>
                    <h4>#454353453</h4>
                    <h4>Iphone 14</h4>
                    <h4>Rua da pedra</h4>
                    <h4>20/01/2022</h4>
                    <h4>€90.00</h4>
                    <h4>Complete</h4>
                    <button>Edit</button>
                    <button>Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')