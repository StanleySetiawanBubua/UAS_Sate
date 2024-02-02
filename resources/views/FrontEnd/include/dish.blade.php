@extends('FrontEnd.master')
@section('title')
    Hidangan
@endsection

@section('content')

    <!-- products -->
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                {{-- For show flash message --}}

                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <h4>{{ Session::get('success') }}</h4>
                    </div>
                @endif

                {{-- // For show flash message --}}
                <div class="product-top">
                    <h4>Koleksi Makanan</h4>
                    <div class="clearfix"> </div>
                </div>

                <div class="products-row">

                    @foreach($categoryDish as $dish)

                    <div class="col-xs-6 col-sm-4 product-grids">
                        <div class="flip-container">
                            <div class="flipper agile-products">
                                <div class="front">
                                    <img src="{{ asset($dish->dish_image) }}" style="width: 277px; height:182px" class="img-responsive" alt="img">
                                    <div class="agile-product-text">
                                        <h5>{{ $dish->dish_name }}</h5>
                                    </div>
                                </div>
                                <div class="back">
                                    <h4>{{ $dish->dish_name }}</h4>
                                    {{--<p>{{ $dish->dish_detail }}</p>--}}
                                    <h6>{{ $dish->full_price }}<sup>Ribu</sup></h6>

                                    <form action="{{ route('add_to_cart') }}" method="post">
                                        <input type="hidden" name="dish_id" value="{{ $dish->dish_id }}">
                                        <a href="#" data-toggle="modal" data-target="#myModal1{{ $dish->dish_id }}">
                                            Lainnya<span class="w3-agile-line"> </span>
                                            <i class="fa fa-cart-plus" aria-hidden="true"></i> Keranjang
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- modal -->
                        <div class="modal video-modal fade" id="myModal1{{ $dish->dish_id }}" tabindex="-1" role="dialog" aria-labelledby="myModal1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <section>
                                        <div class="modal-body">
                                            <div class="col-md-5 modal_body_left">
                                                <img src="{{ asset($dish->dish_image) }}" style="width: 277px; height:182px"  class="img-responsive">
                                            </div>
                                            <div class="col-md-7 modal_body_right single-top-right">
                                                <h3 class="item_name">{{ $dish->dish_name }}</h3>
                                                <p>{{ $dish->dish_detail }}</p>
                                                <div class="single-rating">
                                                    <ul>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li class="w3act"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                        <li class="rating">40 Ulasan</li>
                                                        <li><a href="#">Tambahkan Ulasan Anda</a></li>
                                                    </ul>
                                                </div>
                                                <div class="single-price">
                                                    <ul>
                                                        <li>{{ $dish->full_price }} Ribu</li>
                                                        <li>Berakhir pada : Feb, 20</li>
                                                        <li><a href="#"><i class="fa fa-gift" aria-hidden="true"></i> Kupon</a></li>
                                                    </ul>
                                                </div>
                                                <p class="single-price-text">
                                                Segera kunjungi kami dan rasakan kelezatan sate autentik dengan harga istimewa
                                                </p>

                                                <form action="{{ route('add_to_cart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="dish_id" value="{{ $dish->dish_id }}">
                                                    <h4>Jumlah</h4>
                                                    <input type="number" min="1" name="qty" value="1">
                                                    <button type="submit" class="w3ls-cart pw3ls-cart">
                                                        <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                         Ke Keranjang
                                                    </button>
                                                </form>
                                                @if(Session::has('customer_id'))
<!--                                          wishlist -->
                                                <form action="{{ route('add_to_wishlist') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="dish_id" value="{{ $dish->dish_id }}">

                                                    <button type="submit" class="w3ls-cart w3ls-cart-like">
                                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                        Ke Daftar Ingin
                                                    </button>
                                                </form>
<!--                                                <a href="#" > </a>-->
                                                @else
                                                    <a title="Please Login First To Add This Wishlist"  href="#signin-modal" data-toggle="modal" class="w3ls-cart w3ls-cart-like">
                                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                        Ke Daftar Ingin
                                                    </a>
                                                @endif
                                                <div class="single-page-icons social-icons">
                                                    <ul>
                                                        <li><h4>Bagikan di</h4></li>
                                                        <li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
                                                        <li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
                                                        <li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
                                                        <li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
                                                        <li><a href="#" class="fa fa-rss icon rss"> </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!-- //modal -->

                    @endforeach

                    <div class="clearfix"> </div>
                </div>
            </div>

            <div class="col-md-3 rsidebar">
                <div class="rsidebar-top">
                    <div class="slider-left">
                        <h4>Kategori</h4>
                        <div class="row row1 scroll-pane">

                            @foreach($categories as $category)
                                <label class="checkbox">
                                    <a href="{{ route('category_dish', ['category_id'=>$category->category_id]) }}">
                                        {{$category->category_name}}
                                    </a>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>
    <!-- //products -->
    <div class="container">
        <div class="w3agile-deals prds-w3text">
            <h5>Segera kunjungi kami dan rasakan kelezatan sate autentik dengan harga istimewa</h5>
        </div>
    </div>


@endsection
