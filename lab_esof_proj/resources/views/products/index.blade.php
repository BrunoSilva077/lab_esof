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
                <input type="text" id="valormin" name="valormin" placeholder="0€" class="input-price">
                <input type="text" id="valormax" name="valormax" placeholder="1000€" class="input-price">
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
        @forelse($products as $product)
        <a href="{{ route('products.show', ['product' => $product]) }}" class="each-prod">
                @auth
                @if ($favoritos && $favoritos->contains('product_id', $product->id))
                    <form action="{{ route('removerfavorito', ['product_id' => $product->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="botaoFormfix" style="float:left;">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                <button type="submit" class="botaoFormfix" style="float:right;">
                                    <i class="fa-solid fa-heart fa-lg"></i>
                                </button>
                    </form>
                    @else
                    <form action="{{ route('adicionarfavorito', ['product_id' => $product->id]) }}" method="GET">
                    @csrf
                    <button type="submit" class="botaoFormfix" style="float:right;">
                        <i class="fa-regular fa-heart fa-lg"></i>
                    </button>
                    </form>
                    @endif
                @endauth
                <br>
     
                <div class="img-prod">
                    @if ($product->images->count() > 0)
                        <img src="{{ asset($product->images->first()->path) }}" alt="{{ $product->name }}">
                    @else
                        <img src="img/products/default_image.jpg" alt="{{ $product->name }}">
                    @endif                
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
        </a>
        @empty
            <div class="alert alert-danger">
                No products found.
            </div>
        @endforelse 
   

            <!-- <div class="each-prod">
                <div class="fav-prod">
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
        <ul class="pagination">
            {!! $products->links('pagination::bootstrap-4')!!}
        </ul>
    </div>
    
    
        
</div>

<script src="{{ asset('js/script.js') }}"></script>

@endsection