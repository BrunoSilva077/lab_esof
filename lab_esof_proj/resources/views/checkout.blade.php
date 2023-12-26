@extends('layouts.app')

@section('title')
    Menu Checkout
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
<div class="checkoutmenu">
    <div class="grid-container">
        <div class="grid-item item2 checkout"></div>
        <div class="grid-item item4 checkout">
            <div class="menu1">
                <h1>Delivery Options</h1>
                    <div class="inputsdelivery"><!--Depois meter os required e meter form tb-->
                        <input type="text" placeholder="Address" id="address" >
                        <div class="checkoutinputline">
                            <input type="text" placeholder="Post code" id="pcode" >
                            <input type="text" placeholder="Village/City" id="VillCity" >
                        </div>
                        <input type="text" placeholder="Country/Region" id="ContRegion" >
                        <input type="text" placeholder="Voucher" id="voucher" >
                        <br>
                        <form action="/session" method="POST">
                            <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Go back</a>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type='hidden' name="total" value="6">
                            <input type='hidden' name="voucher_code" value="ric">
                            <input type='hidden' name="productname" value="Asus Vivobook 17 Laptop - Intel Core 10th">
                            <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                        </form>
                    </div>
            </div>
        </div>
        <div class="grid-item item1 checkout"></div>
        <div class="grid-item item3 checkout">
            <div class="menu2">
                <div class="checkoutinputline"> 
                    <h1 class="inyourbag">In Your Bag</h1>
                    <h1 class="editproduct">Edit</h1>
                </div>
                <div class="contentyourbag">
                    <div class="checkoutinputline"> 
                        <h4 class="Subtotal">Subtotal</h4>
                        <h4 class="preco">€90,00</h4>
                    </div>
                    <div class="checkoutinputline"> 
                        <h4 class="EstShip">Estimated Shipping</h4>
                        <h4 class="preco">€90,00</h4>
                    </div>
                    <div class="checkoutinputline"> 
                        <h4 class="EstTax">Estimated Tax</h4>
                        <h4 class="preco">€90,00</h4>
                    </div>
                    <div class="checkoutinputline"> 
                        <h4 class="Total">Total</h4>
                        <h4 class="preco">€90,00</h4>
                    </div>
                    <h3 class="arrivesDate">Arrives by Mon, Nov 27</h3>
                    <div class="checkoutinputline">
                        <img src="https://assets.holyart.it/images/BR005319/pt/500/A/SN020798/CLOSEUP01_HD/h-70c42cac/pulseira-terco-dezena-contas-e-cruz-madeira.jpg" width="50" height="50" id="fotoprod">
                        <div class="classcolumn">
                            <h2 class="info">Terco GOD</h2>
                            <h3 class="info" style="color: #C0BCBC">1</h3>
                            <h3 class="info" style="color: #C0BCBC">€90.00</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid-item item1"></div>
    </div>
</div>
<script src="{{ asset('js/checkoutmenu.js') }}"></script>
@endsection('content')