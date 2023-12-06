@extends('layouts.app')

@section('title')
    Product Page
@endsection

@section('content')

    <div class="product-container grid-container">
        <div class="grid-item item7">
            <div class="images">
                <div class="up-images">
                    <a class="fancybox" data-fancybox="gallery" href="img/products/iphone14/imagem_principal.png">
                        <div class="main-image">
                            <img src="img/products/iphone14/imagem_principal.png" alt="product1.png">
                        </div>
                    </a>
                    <br>
                    <a class="fancybox" data-fancybox="gallery" href="img/products/iphone14/imagem_principal.png">
                        <div class="main-image">
                            <img src="img/products/iphone14/imagem_principal.png" alt="product1.png">
                        </div>
                    </a>
                    <br>
                </div>
                <div class="down-images">
                <a class="fancybox" data-fancybox="gallery" href="img/products/iphone14/imagem_principal.png">
                    <div class="main-image">
                        <img src="img/products/iphone14/imagem_principal.png" alt="product1.png">
                    </div>
                </a>
                    <br>
                    <a class="fancybox" data-fancybox="gallery" href="img/products/iphone14/imagem_principal.png">
                        <div class="main-image">
                            <img src="img/products/iphone14/imagem_principal.png" alt="product1.png">
                        </div>
                    </a>
                </div>
                <div class="favorites">
                    <i class="far fa-heart"></i>
                    <a>Favoritos</a>
                </div>
            </div>
            <div class="detalhes-produto">
                <div class="opcoes">
                    <a class="selected">Detalhes do produto</a>
                    <a class="">Avaliacoes</a>
                </div>
                <hr class="barra-opcoes">
                <div class="product-text">
                    <a> 
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur inventore et autem, eligendi distinctio at doloribus repudiandae dolorum, maxime pariatur sit dolor architecto maiores eius in? In adipisci beatae cupiditate veritatis aliquam magni velit illo blanditiis possimus odit numquam quaerat, dicta ratione excepturi repellat consequatur est inventore distinctio sequi similique? Aspernatur ratione dolorum eaque itaque adipisci deleniti quam odit fuga, sequi explicabo repellat magnam assumenda iure tempore accusamus ipsam iste magni suscipit. Rem iure tenetur esse natus voluptate voluptatibus saepe sit ut provident cumque repellendus nulla aspernatur sequi, blanditiis laudantium autem officiis pariatur iusto error totam vero itaque deleniti possimus.
                    </a>
                </div>
                <div class="avaliacoes">
                    <div class="estrelas">
                        <a><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>(1)</a>
                        <a><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>(0)</a>
                        <a><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>(0)</a>
                        <a><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>(0)</a>
                        <a><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>(0)</a>
                    </div>
                    <div class="escrever-comentario">
                        <form>
                            <textarea name="comentario" id="comentario" placeholder="leave your review..."></textarea>
                            <button class="enviar-comentario-btn">Enviar</button>
                        </form>
                    </div>
                    <div class="nome-produto">
                        <a>Iphone14 black</a>
                    </div>
                    <div class="avaliacoes-texto">

                        <div class="comentario">
                            <a> John Doe - 10/10/2010</a>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                        </div>
                    </div>
                    <hr class="barra-opcoes">
                    <div class="avaliacoes-texto">
                        <div class="comentario">
                            <a> John Doe - 10/10/2010</a>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.</p>
                        </div>
                    </div>
                    <hr class="barra-opcoes">
                </div>
            </div>
        </div>
        <div class="grid-item item5 sideimage">
            <div class="informacoes-produto">
                <div class="nome-produto">
                    <a>Iphone14 black</a>
                </div>
                <div class="preco-produto">
                    <a>869,00€</a>
                </div>
                <div class="stock">
                    <i class="fas fa-check-circle"></i>
                    <a>In stock</a>
                </div>
                <div class="quantidade-botoes">
                    <div class="quantidade">
                        <button class="menos" onclick="removeProduct()">-</button>
                        <input type="text" value="1" class="numero" disabled>
                        <button class="mais" onclick="addProduct()">+</button>
                    </div>
                    <div class="adicionar">
                        <button class="adicionar-carrinho-btn"><i class="fas fa-shopping-cart"></i>Adicionar</button>
                    </div>   
                    <div class="comprar-ja">
                        <button class="comprar-ja-btn">Comprar já<i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    const opcoes = document.querySelectorAll('.opcoes a');

    opcoes.forEach(opcao => {
        opcao.addEventListener('click', function() {
            opcoes.forEach(opcao => opcao.classList.remove('selected'));
            this.classList.add('selected');

            const selectedText = this.innerText;

            const productText = document.querySelector('.product-text');
            const avaliacoes = document.querySelector('.avaliacoes');

            if (selectedText === 'Detalhes do produto') {
                productText.style.opacity = 1;
                productText.style.height = 'auto';
                avaliacoes.style.opacity = 0;
                avaliacoes.style.height = '0';
            } else {
                productText.style.opacity = 0;
                productText.style.height = '0';
                avaliacoes.style.opacity = 1;
                avaliacoes.style.height = 'auto';
            }
        });
    });

    function addProduct() {
        const quantidade = document.querySelector('.quantidade .numero');
        const quantidadeValue = parseInt(quantidade.value);
        quantidade.value = quantidadeValue + 1;
    }

    function removeProduct() {
        const quantidade = document.querySelector('.quantidade .numero');
        const quantidadeValue = parseInt(quantidade.value);
        if (quantidadeValue > 1) {
            quantidade.value = quantidadeValue - 1;
        }
    }

</script>

@endsection