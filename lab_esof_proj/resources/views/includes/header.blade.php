<nav>
        <div class="grid-container">
            <div class="grid-item item4">
                <div class="logo">
                    <h1></h1>
                </div>
            </div>
            <div class="grid-item item1 home">
                <ul class="ul-container">
                    <li class="btn active"><a href="/home" onclick="changeActive(this)">Home</a></li>
                </ul>
            </div>
            <div class="grid-item item1 products">
                <ul class="ul-container">
                    <li class="btn"><a href="#products" onclick="changeActive(this)">Products</a></li>
                </ul>
            </div>
            <div class="grid-item item4 contact">
                <ul class="ul-container">
                    <li class="btn"><a href="#contacts" onclick="changeActive(this)">Contact us</a></li>
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
                        <a href="" class="cart">
                            <i class="fas fa-shopping-bag fa-2x"></i>
                        </a>
                        <div class="vertical-line"></div>
                        <a class="menu">
                            <i class="fas fa-bars fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="grid-item item1 menu">
                <div class="cart-container">
                    <a href="" class="cart">
                        <i class="fas fa-shopping-bag fa-2x"></i>
                    </a>
                    <div class="vertical-line"></div>
                    <a class="menu">
                        <i class="fas fa-bars fa-2x"></i>
                    </a>
                </div>
            </div>
            <div class="grid-item item2 responsive-menu-options">
                <div class="grid-item item2 responsive-input">
                        <form>
                            <input type="text" placeholder="Search.." name="search">
                        </form>
                </div>
                <div class="grid-item item2 responsive-menu">
                    <ul class="ul-container">
                        <li class="btn active"><a href="/home" onclick="changeActive(this)">Home</a>
                    </li>
                    </ul>
                </div>
                <div class="grid-item item2 responsive-menu">
                    <ul class="ul-container">
                        <li class="btn"><a href="#products" onclick="changeActive(this)">Products</a>
                    </li>
                    </ul>
                </div>
                <div class="grid-item item2 responsive-menu">
                    <ul class="ul-container">
                        <li class="btn">
                            <a href="#contacts" onclick="changeActive(this)">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grid-item item5 item-space"></div>
            <div class="grid-item item1 user-menu-item">
                <div class="user-menu">
                    <ul class="ul-container-menu">
                        <div class="group-li">
                            <li>
                                <a href="#login/register">Login/Register</a>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        
                        <hr class="user-menu-hr">
                        <div class="group-li">
                            <li>
                                <a href="#favorites">Favorites</a>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        <hr class="user-menu-hr">
                        <div class="group-li history">
                            <li>
                                <a href="#history">Purchase History</a>
                                <i class="fas fa-chevron-right"></i>
                            </li>
                        </div>
                        <hr class="user-menu-hr">
                    </ul>
                </div>
            </div>


            
        </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        const menuBtn = document.querySelector('.menu .menu i');
        const menuBtnSearchCartContainer = document.querySelector('.search-cart-container .cart-container .menu i');
        const divsResponsiveMenuOptions = document.querySelector('.responsive-menu-options'); // caixa geral do menu
        const divsResponsiveMenu  = document.querySelectorAll('.responsive-menu'); // caixa da pesquisa
        const divsResponsiveInput = document.querySelector('.responsive-input'); // caixa com as opçoes do menu
        const divHamburguerMenu = document.querySelector('.user-menu-item');
        const divItem5 = document.querySelector('.grid-item.item5');
        menuBtnSearchCartContainer.addEventListener('click',() =>{

            if(divHamburguerMenu.style.display === 'none' || divHamburguerMenu.style.display === ''){
                console.log('entrou');
                divHamburguerMenu.style.display = 'block';
                divItem5.style.display = 'block';
            }else{
                divHamburguerMenu.style.display = 'none';
                divItem5.style.display = 'none';
            }

        })

        menuBtn.addEventListener('click',function(){

            if(divHamburguerMenu.style.display === 'none' || divHamburguerMenu.style.display === ''){
                divHamburguerMenu.style.display = 'block';
                divItem5.style.display = 'block';
            }else{
                divHamburguerMenu.style.display = 'none';
                divItem5.style.display = 'none';
            }

            const windowWidth = window.innerWidth;

            const resolutionsToDisplayBlock = [
                { min: 320, max: 374 },
                { min: 375, max: 424 },
                { min: 425, max: 767 },
            ];
            const shouldDisplayBlock = resolutionsToDisplayBlock.some(resolution => {
                return windowWidth >= resolution.min && windowWidth <= resolution.max;
            });

            divsResponsiveMenu.forEach( function(div) {

                if( (shouldDisplayBlock === true) && (div.style.display === 'none' || div.style.display === '') ){
                    divsResponsiveMenuOptions.style.display = 'block';
                    divsResponsiveInput.style.display = 'block';
                    div.style.display = 'block';
                }else{
                    divsResponsiveMenuOptions.style.display = 'none';
                    divsResponsiveInput.style.display = 'none';
                    div.style.display = 'none';
                }
                
            })

        })

    })

    function changeActive(clickedElement) {
        // Remover a classe active de todos os elementos
        var allLinks = document.querySelectorAll('.btn a');
        allLinks.forEach(function (link) {
            link.parentElement.classList.remove('active');
        });

        // Adicionar a classe active ao elemento clicado
        clickedElement.parentElement.classList.add('active');
        window.location.href = clickedElement.getAttribute('href');
    }



</script>