@extends('layouts.app')

@section('title')
    Favorites Profile
@endsection

@section('content')
<div class="editprofilemenu">
<div class="grid-container">
<div class="grid-item item3 menuedit">
            <div class="sidemenuedit">
                <div class="profileinputline">
                    <a href="{{ route('editprofile', ['user' => auth()->user()]) }}"><h3>Account<i class="fa-solid fa-box" style="opacity:1.0;"></i></h3></a>
                </div>
                <div class="profileinputline active">
                    <a href="{{ route('listarfavoritos', ['user' => auth()->user()]) }}"><h3>Favorites<i class="fa-solid fa-heart"></i></h3></a>
                </div>
                <div class="profileinputline">
                    <a href="{{ route('editprofile', ['user' => auth()->user()]) }}"><h3>History<i class="fa-solid fa-clock-rotate-left"></i></h3></a>
                </div>
            </div>
        </div>
    <!-- ... (seu código existente) ... -->
    <div class="grid-item item9 menuedit">
        <div class="mainmenuedit" style="height:auto">
            <div class="all-prod">
                @forelse($favoritos as $favorito)
                <a href="{{ route('products.show', ['product' => $favorito]) }}" class="each-prod">
                        <div class="fav-prod profile">
                            <form action="{{ route('removerfavorito', ['favorito' => $favorito]) }}" method="POST" class="formFav">
                                @csrf
                                <button type="submit" class="botaoFormfix" style="float:left;">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                <button type="submit" class="botaoFormfix" style="float:right;">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </form>
                        </div>
                        <div class="img-prod">
                            @if ($favorito->product->images->count() > 0)
                                <img src="{{ asset($favorito->product->images->first()->path) }}" alt="{{ $favorito->product->name }}">
                            @else
                                <img src="img/products/default_image.jpg" alt="{{ $favorito->product->name }}">
                            @endif                
                        </div> 
                        <div class="text-prod">
                            {{ $favorito->product->name }}
                        </div>
                        <div class="prec-prod">
                            ${{ $favorito->product->price }}
                        </div>
                        @if ($favorito->product->active)
                            <div class="stock-prod in-stock">
                            <i class="fa-solid fa-circle-check"></i>In Stock
                            </div>
                        @else
                            <div class="stock-prod no-stock">
                            <i class="fa-solid fa-times-circle"></i>Out of Stock
                            </div>
                         @endif
                        <!-- ... (outros detalhes do produto) ... -->
                    </a>
                @empty
                    <div class="alert alert-danger">
                        No favorite products found.
                    </div>
                @endforelse 
            </div>
        </div>
    </div>
    <!-- ... (seu código existente) ... -->
</div>
</div>
@endsection('content')
