@extends('layouts.app')

@section('title')
    Products
@endsection

@section('content')


<div class="grid-container"> 
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
                <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="dropdown1">
                <button onclick="myFunction1()" class="dropbtn1">Dropdown</button>
                <div id="myDropdown1" class="dropdown-content1">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div> 
        </div>
        <div class="all-prod">
            <div class="each-prod">
        
            </div>
            
            <div class="each-prod">
                
            </div>
            
            <div class="each-prod">
                
            </div>
            <div class="each-prod">
                
            </div>
            <div class="each-prod">
                
            </div>
            <div class="each-prod">
                
            </div>

        </div> 
    </div>
    
    
        
</div>

<script src="{{ asset('js/script.js') }}"></script>

@endsection