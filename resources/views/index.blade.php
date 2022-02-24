@extends('layouts.frontApp')

@section('content')

<div class="container">
    @include('partials.ecname')
    

    <!-- End Books products grid -->

    <div class="container">
        <div class="row pt120">
            <div class="books-grid">

            <div class="row mb30">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="books-item">
                        <div class="books-item-thumb">
                            <img src="{{ asset('/storage/' . $product->img) }}" alt="book">
                            <div class="new">New</div>
                            <div class="sale">Sale</div>
                            <div class="overlay overlay-books"></div>
                        </div>
                        <div class="books-item-info">
                            <a href="{{ route('showProduct', $product->id)}}">
                                <h5 class="books-title">{{ $product->name }}</h5>
                            </a>    
                            <div class="books-price">{{ $product->price }} RSD</div>
                        </div>
<!-- fdssssssssssssssssssssssssssssssssssssssssssssssss
                        <form action="{{ route('cart.add') }}" method="POST">
                        {{ csrf_field() }}

                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                        <div class="quantity">
                            <a href="#" class="quantity-minus quantity-minus-d">-</a>
                            <input title="Qty" class="email input-text qty text" type="text" name="qty" value="1">
                            <a href="#" class="quantity-plus quantity-plus-d">+</a>
                        </div>

                        <button type="submit" class="btn btn-medium btn--primary">
                            <span class="text">Add to Cart</span>
                            <i class="seoicon-commerce"></i>
                            <span class="semicircle"></span>
                        </button>
                        -->
                    
<!-- fdssssssssssssssssssssssssssssssssssssssssssssssss-->
                        <form action="{{ route('cart.add') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                                <input type="hidden" title="Qty" class="email input-text qty text" type="text" name="qty" value="1">
                                <button type="submit" class="btn btn-small btn--dark add">
                                    <span class="text">Add to Cart</span>
                                    <i class="seoicon-commerce"></i>
                                    <span class="semicircle"></span>
                                </button>
                        </form>
                     <!--   <a href="{{ route('cart.add') }}" class="btn btn-small btn--dark add">
                            <span class="text">Add to Cart</span>
                            <i class="seoicon-commerce"></i>
                        </a>
                    -->
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="row pb120">
                {{ $products->links() }}
            </div>
        </div>
        </div>
    </div>
@endsection