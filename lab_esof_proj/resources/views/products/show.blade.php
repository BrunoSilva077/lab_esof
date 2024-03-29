@extends('layouts.app')

@section('title')
    Product Page
@endsection

@section('content')
    <div class="product-container grid-container">
        <div class="grid-item item7">
            <div class="images">
            @auth
                @if ($favoritos && $favoritos->contains('product_id', $product->id))
                    <form action="{{ route('removerfavorito', ['product_id' => $product->id]) }}" method="POST">
                                @csrf
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
                <div class="up-images">
                    @forelse($product->images->take(2) as $image)
                        <a class="fancybox" data-fancybox="gallery" href="{{ asset($image->path) }}">
                            <div class="main-image">
                                <img src="{{asset($image->path) }}" alt="{{ $image->name }}">
                            </div>
                        </a>
                        <br>
                    @empty
                        <p>Nenhuma imagem disponível para este produto.</p>
                    @endforelse
                </div>
                <div class="down-images">
                    @forelse($product->images->take(2) as $image)
                        <a class="fancybox" data-fancybox="gallery" href="{{ asset($image->path) }}">
                            <div class="main-image">
                                <img src="{{ asset($image->path) }}" alt="{{ $image->name }}">
                            </div>
                        </a>
                        <br>
                    @empty
                        <p>Nenhuma imagem disponível para este produto.</p>
                    @endforelse
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
                        {{ $product->description }}
                    </a>
                </div>
                <div class="avaliacoes">
                    <div class="escrever-comentario">
                        <form>
                            <textarea name="comentario" id="comentario" placeholder="leave your review..."></textarea>
                            <button class="enviar-comentario-btn">Enviar</button>
                        </form>
                    </div>
                    <div class="nome-produto">
                        <a>{{ $product->name }}</a>
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
                    <a>{{ $product->name }}</a>
                </div>
                <br>
                <div class="nome-produto">
                    <a>Brand: {{ $product->brand->name }}</a>
                </div>
                <div class="preco-produto">
                    <a>{{ $product->price }}€</a>
                </div>
                    @if ($product->active)
                    <div class="stock in-stock">
                    <i class="fas fa-check-circle"></i>
                    <a>{{ $product->stock }} In Stock</a>
                    <div class="quantidade-botoes">
                    @auth                           

                    <div class="quantidade">
                        <button class="menos" onclick="removeProduct()">-</button>
                        <input type="text" value="1" class="numero show" disabled>
                        <button class="mais" onclick="addProduct()">+</button>
                    </div>
                    @else
                    <p style="color:white;">Log in to add this product to your cart.</p>
                    @endauth
                    <form action=" {{ route('cart.store') }}" method="POST">
                        @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="quantity" id="quantity" value="1">

                            @if ($product->images->count() > 0)
                                <input type="hidden" name="image" value="{{asset($product->images->first()->path) }}" alt="{{ $product->name }}">
                            @else
                                <input type="hidden" name="image" value="img/products/default_image.jpg" alt="{{ $product->name }}">
                            @endif
                            @auth                           
                            <div class="adicionar">
                                <button class="adicionar-carrinho-btn"><i class="fas fa-shopping-cart"></i>Adicionar</button>
                            </div> 
                            @else
                            @endauth  
                    </form>
                </div>
                    </div>
                    @else
                        <div class="stock no-stock">
                        <i class="fas fa-times-circle"></i>
                        <a>Out of Stock</a>
                        </div>
                    @endif

            </div>
        </div>
    </div>

<script>
    const opcoes = document.querySelectorAll('.opcoes a');
    // const stock = {{ $product->stock }}; // Obtém o valor do estoque do Laravel


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
        const quantidade = document.querySelector('.quantidade .numero.show');
        // console.log(quantidade);
        const quantidadeValue = parseInt(quantidade.value);
        if (quantidadeValue < stock){
            quantidade.value = quantidadeValue + 1;
        }
        document.getElementById('quantity').value = quantidade.value;
    }

    function removeProduct() {
        const quantidade = document.querySelector('.quantidade .numero.show');
        const quantidadeValue = parseInt(quantidade.value);
        if (quantidadeValue > 1) {
            quantidade.value = quantidadeValue - 1;
        }
        document.getElementById('quantity').value = quantidade.value;
    }

</script>

@endsection