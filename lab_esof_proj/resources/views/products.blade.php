@extends('layouts.app')

@section('title')
    Products
@endsection

@section('content')


<div class="grid-container medi-prod"> 
    <div class="grid-item item3 products">
        <div class="form-products">
            <div class="form">
                Filtros:
            </div>
            <div class="stock" >
                <div class="stock-text">
                    <li class="sto-wit">
                        Stock:
                    </li>
                    <li class="dropdown">
                        <i class="fa-solid fa-chevron-down" id="arrow"></i>
                    </li>
                </div>
                
            </div>
            <div class="stock-menu" id="stock-menu">
                <input type="checkbox" id="stock" name="stock" value="stock" class="input-product">
                <label for="stock" class="label-product"> In Stock</label><br>
                <input type="checkbox" id="outstock" name="outstock" value="outstock" class="input-product">
                <label for="outstock" class="label-product"> Out of Stock</label><br>
            </div>

            <hr class="line-prod">


            <div class="stock" >
                <div class="stock-text">
                    <li class="sto-wit">
                        Marca:
                    </li>
                    <li class="dropdown">
                        <i class="fa-solid fa-chevron-down" id="arrow2"></i>
                    </li>
                </div>
                
            </div>
            <div class="stock-menu" id="stock-menu2">
                <input type="checkbox" id="apple" name="apple" value="apple" class="input-product">
                <label for="apple" class="label-product"> Apple</label><br>
                <input type="checkbox" id="samsung" name="samsung" value="samsung" class="input-product">
                <label for="samsung" class="label-product"> Samsung</label><br>
            </div>

            <hr class="line-prod">

            <div class="stock" >
                <div class="stock-text">
                    <li class="sto-wit">
                        Cor:
                    </li>
                    <li class="dropdown">
                        <i class="fa-solid fa-chevron-down" id="arrow3"></i>
                    </li>
                </div>
                
            </div>
            <div class="stock-menu" id="stock-menu3">
                <input type="checkbox" id="preto" name="preto" value="preto" class="input-product">
                <label for="preto" class="label-product"> Preto</label><br>
                <input type="checkbox" id="branco" name="branco" value="branco" class="input-product">
                <label for="branco" class="label-product"> Branco</label><br>
            </div>

            <hr class="line-prod">

            <div class="stock" >
                <div class="stock-text">
                    <li class="sto-wit">
                        Intervalo de preço:
                    </li>
                    <li class="dropdown">
                        <i class="fa-solid fa-chevron-down" id="arrow4"></i>
                    </li>
                </div>
                
            </div>
            <div class="stock-menu" id="stock-menu4">
                <input type="text" id="valormin" name="valormin" value="0€" class="input-price">
                <input type="text" id="valormax" name="valormax" value="1000€" class="input-price">
            </div>

        </div>
    </div>
    <div class="grid-item item1"></div>
    <div class="grid-item item8" style="padding: 0px 0px">
        <div class="productf">
            <div class="dropdown">
                Order by:
                <button onclick="myFunction()" class="dropbtn">Relevance <i class="fa-solid fa-chevron-down"></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#">Highest price</a><hr class="border-hr">
                    <a href="#">Lowest price</a><hr class="border-hr">
                    <a href="#">Most Recent</a><hr class="border-hr">
                    <a href="#">Relevance</a><hr class="border-hr">
                </div>
            </div>
            <div class="dropdown1">
                Products per page:
                <button onclick="myFunction1()" class="dropbtn1">3<i class="fa-solid fa-chevron-down"></i></button>
                <div id="myDropdown1" class="dropdown-content1">
                    <a href="#">3</a><hr class="border-hr">
                    <a href="#">6</a><hr class="border-hr">
                    <a href="#">9</a><hr class="border-hr">
                    <a href="#">12</a><hr class="border-hr">
                </div>
            </div> 
        </div>
        <div class="all-prod">
            <div class="each-prod">
                <div class="fav-prod">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="img-prod">
                    <img src="https://www.shutterstock.com/image-photo/mobile-phone-premium-png-digital-600nw-2240659385.jpg"></i>
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
            </div>
            
            <div class="each-prod">
                <div class="fav-prod">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="img-prod">
                    <img src="https://www.shutterstock.com/image-photo/mobile-phone-premium-png-digital-600nw-2240659385.jpg"></i>
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
            </div>
            
            <div class="each-prod">
                <div class="fav-prod">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="img-prod">
                    <img src="https://www.shutterstock.com/image-photo/mobile-phone-premium-png-digital-600nw-2240659385.jpg"></i>
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
            </div>
            <div class="each-prod">
                <div class="fav-prod">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="img-prod">
                    <img src="https://www.shutterstock.com/image-photo/mobile-phone-premium-png-digital-600nw-2240659385.jpg"></i>
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
            </div>
            <div class="each-prod">
                <div class="fav-prod">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="img-prod">
                    <img src="https://www.shutterstock.com/image-photo/mobile-phone-premium-png-digital-600nw-2240659385.jpg"></i>
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
            </div>
            <div class="each-prod">
                <div class="fav-prod">
                    <i class="fa-regular fa-heart"></i>
                </div>
                <div class="img-prod">
                    <img src="https://www.shutterstock.com/image-photo/mobile-phone-premium-png-digital-600nw-2240659385.jpg"></i>
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
            </div>
            

        </div> 
    </div>
    
    
        
</div>

<script src="{{ asset('js/script.js') }}"></script>

@endsection