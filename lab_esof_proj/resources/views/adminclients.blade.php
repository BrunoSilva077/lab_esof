@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
<div class="adclientmenu">
    <div class="grid-container">
        <div class="grid-item item2 adclient">
            <div class="sidemenuclient">
                <div class="checkoutinputline">
                    <h3>Orders<i class="fa-solid fa-box" style="opacity:1.0;"></i></h3>
                </div>
                <div class="checkoutinputline active">
                    <h3>Clients<i class="fa-solid fa-user"></i></h3>
                </div>
                <div class="checkoutinputline">
                    <h3>Products<i class="fa-solid fa-cart-shopping"></i></h3>
                </div>
            </div>
        </div>
        <div class="grid-item item1 adclient"></div>
        <div class="grid-item item9 adclient">
            <div class="mainmenuclient">
                <div class="checkoutinputline">
                    <h3>#</h3>
                    <h3>Active</h3>
                    <h3>Name</h3>
                    <h3>Email</h3>
                    <h3>Phone Number</h3>
                    <h3>Password</h3>
                    <h3>Edit</h3>
                    <h3>Remove</h3>
                </div>
                <hr class="horizontal-adclient">
                <div class="checkoutinputline">
                    
                    <h4>1</h4>
                    <h4>True</h4>
                    <h4>Joaquim Alberto</h4>
                    <h4>jquim@gmail.com</h4>
                    <h4>98736326</h4>
                    <h4>jquim2022</h4>
                    <button>Edit</button>
                    <button>Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')