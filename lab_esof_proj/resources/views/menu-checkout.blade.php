@extends('layouts.app')

@section('title')
    Menu Checkout
@endsection

@section('content')
<div class="checkoutmenu">
    <div class="grid-container">
        <div class="grid-item item2 checkout"></div>
        <div class="grid-item item4 checkout">
            <div class="menu1">
                <h1>Delivery Options</h1>
                    <div class="inputsdelivery"><!--Depois meter os required e meter form tb-->
                        <div class="checkoutinputline">
                            <input type="text" placeholder="First Name" id="fname" >
                            <input type="text" placeholder="Last Name" id="lname" >
                        </div>
                        <input type="text" placeholder="Address" id="address" >
                        <div class="checkoutinputline">
                            <input type="text" placeholder="Post code" id="pcode" >
                            <input type="text" placeholder="Village/City" id="VillCity" >
                        </div>
                        <input type="text" placeholder="Country/Region" id="ContRegion" >
                        <div class="checkoutinputline">
                            <input type="email" placeholder="Email" id="email" >
                            <input type="text" placeholder="Phone Number" id="pnumber" >
                        </div>
                        <button type="submit" id="cntbutton" onclick="mostrarInput()" style="cursor: pointer;">Continue</button>
                        <hr class="linhacheckout">
                    </div>
                    <div id="menuescondido">
                        <h1>Payment</h1>
                        <div class="inputspayment">
                            <div class="checkoutinputline">
                                <input type="checkbox" value="promo" id="habilitarInput">
                                <label for="habilitarInput" style="color:white">Do you have any promo code?</label>
                            </div>
                            <input type="text" id="textoInput" placeholder="Code" disabled>
                            <h2>Add Card</h2>
                            <div>
                                <input type="text" placeholder="Card Number" id="cnumb">
                                <input type="text" placeholder="MM/YY" id="mmyy">
                                <input type="text" placeholder="CVV" id="cvv">
                            </div>
                            <hr class="linhacheckout2">
                            <button type="submit" id="placeorder" style="cursor: pointer;">Place Order</button>
                        </div>
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