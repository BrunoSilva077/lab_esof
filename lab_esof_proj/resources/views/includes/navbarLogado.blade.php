<nav>
    <div class="side-cart menu">
        <div class="side-cart-name">
            <h1>Menu</h1>
            <i class="fas fa-times" onclick="closeCart(this)"></i>
        </div>
        <div class="user-menu">
                    <ul class="ul-container-menu">
                        <div class="group-li">
                            <input type="text" placeholder="Search.." name="search">
                        </div>
                        <div class="group-li">
                            <li>
                            <a href="{{ route('editprofile', ['user' => auth()->user()]) }}">Profile</a>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        
                        <hr class="user-menu-hr">
                        <div class="group-li">
                            <li>
                                <a href="">Favorites</a>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        <hr class="user-menu-hr">
                        <div class="group-li history">
                            <li>
                                <a href="{{ route('editprofile', ['user' => auth()->user()]) }}">Purchase History</a>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        <hr class="user-menu-hr">
                        <div class="group-li">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        <hr class="user-menu-hr">
                    </ul>
                </div>
    </div>

    <div class="side-cart responsive-menu">
        <div class="side-cart-name">
            <h1>Menu</h1>
            <i class="fas fa-times" onclick="closeCart(this)"></i>
        </div>
        <div class="user-menu">
                    <ul class="ul-container-menu">
                        <div class="group-li">
                            <input type="text" placeholder="Search.." name="search">
                        </div>
                    <div class="group-li">
                            <li>
                            <a href="{{ route('editprofile', ['user' => auth()->user()]) }}">Profile</a>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        
                        <hr class="user-menu-hr">
                        <div class="group-li">
                            <li>
                                <a href="favprofile">Favorites</a>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        <hr class="user-menu-hr">
                        <div class="group-li history">
                            <li>
                                <a href="{{ route('editprofile', ['user' => auth()->user()]) }}">Purchase History</a>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        <hr class="user-menu-hr">
                        <div class="group-li">
                            <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        <hr class="user-menu-hr">
                        <div class="group-li">
                            <li class="btn">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                        </div>
                        <hr class="user-menu-hr">
                        <div class="group-li">
                            <li class="btn">
                                <a href="{{ route('products.index') }}">Products</a>
                            </li>
                        </div>
                        <hr class="user-menu-hr">
                        <div class="group-li">
                            <li class="btn">
                                <a href="{{ route('contact') }}">Contact us</a>
                            </li>
                        </div>
                        <hr class="user-menu-hr">

                    </ul>
                </div>
    </div>

            <div class="side-cart cart">
                <div class="side-cart-name">
                    <h1>Cart</h1>
                    <i class="fas fa-times" onclick="closeCart(this)"></i>
                </div>
                <div class="side-cart-options">
                    <div class="items">
                        <div class="total-price">
                            <h1>Total(2 items): 1399.98€</h1>
                        </div>
                        <hr class="barra-opcoes">
                        
                            <div class="each-item">
                                <div class="item-img">
                                    <img src="img/products/iphone14/imagem_principal.png" alt="imagem_principal.png">
                                </div>
                                <div class="item-info">
                                    <div class="item-name">
                                        <h1>$row->name</h1>
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <h2>PVPR: 889€</h2>
                                    <h2>669,99€</h2>
                                    <div class="stock">
                                        <i class="fas fa-check-circle"></i>
                                        <a>In stock</a>
                                    </div>
                                </div>    
                            </div>
                        
                        <hr class="barra-opcoes">
                        <div class="each-item">
                            <div class="item-img">
                                <img src="img/products/iphone14/imagem_principal.png" alt="imagem_principal.png">
                            </div>
                            <div class="item-info">
                                <div class="item-name">
                                    <h1>iPhone 14</h1>
                                    <i class="fas fa-times"></i>
                                </div>
                                <h2>PVPR: 889€</h2>
                                <h2>669,99€</h2>
                                <div class="stock">
                                    <i class="fas fa-check-circle"></i>
                                    <a>In stock</a>
                                </div>
                            </div>    
                        </div>
                        <hr class="barra-opcoes">
                        <div class="each-item">
                            <div class="item-img">
                                <img src="img/products/iphone14/imagem_principal.png" alt="imagem_principal.png">
                            </div>
                            <div class="item-info">
                                <div class="item-name">
                                    <h1>iPhone 14</h1>
                                    <i class="fas fa-times"></i>
                                </div>
                                <h2>PVPR: 889€</h2>
                                <h2>669,99€</h2>
                                <div class="stock">
                                    <i class="fas fa-check-circle"></i>
                                    <a>In stock</a>
                                </div>
                            </div>    
                        </div>
                        <hr class="barra-opcoes">
                        <div class="each-item">
                            <div class="item-img">
                                <img src="img/products/iphone14/imagem_principal.png" alt="imagem_principal.png">
                            </div>
                            <div class="item-info">
                                <div class="item-name">
                                    <h1>iPhone 14</h1>
                                    <i class="fas fa-times"></i>
                                </div>
                                <h2>PVPR: 889€</h2>
                                <h2>669,99€</h2>
                                <div class="stock">
                                    <i class="fas fa-check-circle"></i>
                                    <a>In stock</a>
                                </div>
                            </div>    
                        </div>
                        <hr class="barra-opcoes">
                        <div class="each-item">
                            <div class="item-img">
                                <img src="img/products/iphone14/imagem_principal.png" alt="imagem_principal.png">
                            </div>
                            <div class="item-info">
                                <div class="item-name">
                                    <h1>iPhone 14</h1>
                                    <i class="fas fa-times"></i>
                                </div>
                                <h2>PVPR: 889€</h2>
                                <h2>669,99€</h2>
                                <div class="stock">
                                    <i class="fas fa-check-circle"></i>
                                    <a>In stock</a>
                                </div>
                            </div>    
                        </div>
                        <hr class="barra-opcoes">
                    </div>
                    <div class="side-cart-checkout">
                        <a>checkout</a>
                    </div>
                </div>
            </div>
        <div class="grid-container">
            <div class="grid-item item4 logo">
                <div class="logo">
                    <h1></h1>
                </div>
            </div>
            <div class="grid-item item1 home">
                <ul class="ul-container">
                    <li class="btn"><a href="{{ route('home') }}">Home</a></li>
                </ul>
            </div>
            <div class="grid-item item1 products-options">
                <ul class="ul-container">
                    <li class="btn"><a href="{{ route('products.index') }}">Products</a></li>
                </ul>
            </div>
            <div class="grid-item item4 contact">
                <ul class="ul-container">
                    <li class="btn"><a href="{{ route('contact') }}">Contact us</a></li>
                </ul>
            </div>
            <div class="grid-item item1 search">
                <div class="search-cart-container">
                    <div class="search-container">
                        <form>
                            <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            <input type="text" placeholder="Search.." name="search">
                        </form>
                    </div>
                    <div class="cart-container">
                        <a class="cart">
                            <i class="fas fa-shopping-bag fa-2x" onclick="openCart()"></i>
                        </a>
                        <div class="vertical-line"></div>
                        <a class="menu">
                            <i class="fas fa-bars fa-2x" onclick="openMenu(this)"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid-item item1 menu">
                <div class="cart-container">
                    <a class="cart" onclick="openCart()">
                        <i class="fas fa-shopping-bag fa-2x"></i>
                    </a>
                    <div class="vertical-line"></div>
                    <a class="menu">
                        <i class="fas fa-bars fa-2x" onclick="openMenu()"></i>
                    </a>
                </div>
            </div>
        </div>
</nav>
<script src="{{ asset('js/navbarNaoLogado.js') }}"></script>