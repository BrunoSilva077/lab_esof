@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="wrapper">
        <section>
            <div class="grid-container">
                <div class="grid-item item12 home">
                    <div class="slideshow-container">
                        @forelse($randomProducts as $index => $product)
                            <a href="{{ route('products.show', ['product' => $product]) }}" class="slide fade">
                                @if ($product->images->count() > 0)
                                    <img src="{{ asset($product->images->first()->path) }}" alt="{{ $product->name }}">
                                @else
                                    <img src="img/products/default_image.jpg" alt="{{ $product->name }}">
                                @endif    
                            </a>
                        @empty
                            <p>No products available.</p>
                        @endforelse

                        <a class="prev" onclick="plusSlides(1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(-1)">&#10095;</a>
                        <div style="text-align:center">
                            @forelse($randomProducts as $index => $product)
                                <span class="trace" onclick="currentSlide({{ $index + 1 }})"></span>
                            @empty
                                <!-- No traces needed when no products are available -->
                            @endforelse
                        </div>
                    </div>
                    <br>
                    <div class="checkoutinputline">
                        <hr class="linhahome">
                        <hr class="linhahome2">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('js/slideshow.js') }}"></script>
@endsection