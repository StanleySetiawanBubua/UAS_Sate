<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Staple Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
        SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Custom Theme files -->
        <link href="{{ asset('/') }}frontEndSourceFile/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
        <link href="{{ asset('/') }}frontEndSourceFile/css/style.css" type="text/css" rel="stylesheet" media="all">
        <link href="{{ asset('/') }}frontEndSourceFile/css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
        <link rel="stylesheet" href="{{ asset('/') }}frontEndSourceFile/css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
        <!-- //Custom Theme files -->
        <!-- js -->
        <script src="{{ asset('/') }}frontEndSourceFile/js/jquery-2.2.3.min.js"></script>
        <!-- //js -->
        <!-- web-fonts -->
        <link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
        <!-- sign up-page -->
    </head>
    <body>

        <div class="banner">
            <!-- header -->
            <div class="header">
                <div class="w3ls-header"><!-- header-one -->
                    <div class="container">
                        <div class="w3ls-header-left">
                            <a href="{{ url('/') }}">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                <span style="color: white">Back To More</span>
                            </a>
                        </div>
                        <div class="w3ls-header-right">
                            <ul>
                                <li class="head-dpdn">
                                    <a href="{{ route('cart_show') }}" style="color: white">
                                        <button class="w3view-cart" type="submit" name="submit" value="">
                                            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </li>

                                @if(Session::has('customer_id'))
                                    <li class="head-dpdn">
                                        <a href="#" onclick="document.getElementById('customerLogout').submit();">
                                            <i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                                        <form action="{{ route('log_out') }}" id="customerLogout" method="POST">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <li class="head-dpdn">
                                        <a href="#signin-modal" data-toggle="modal">
                                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                                            Login
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <!-- //header-one -->
            </div>
        </div>



        <div class="wthree-order">

            <div class="container">
                <h3 class="w3ls-title">Welcome {{ $customer->name }}...!</h3>
                <p class="w3lsorder-text">Here You can customize your <strong>Wishlist Order</strong>.</p>
                <hr/>
                <div class="order-agileinfo">
                    <div class="col-md-10 col-sm-10 col-xs-10 order-w3lsgrids">
                        {{-- For show flash message --}}

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <h4>{{ Session::get('success') }}</h4>
                            </div>
                        @endif

                        {{-- // For show flash message --}}
                        <h3>Wishlist</h3>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Dish Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>


                                @php
                                    $customerId = Session::get('customer_id');
                                     $customerWishlist = App\Wishlist::where('customer_id',$customerId)->latest()->get();
                                @endphp

                                <tbody>
                                @php($i = 1)
                                @forelse($customerWishlist as $wish)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td style="color: #2a07b3;font-size: 15px">{{ $wish->dish->dish_name }}</td>
                                        <td>
                                            <img src="{{ asset($wish->dish->dish_image) }}" alt="dish-img"
                                                 style="width: 70px; height: 70px; border-radius: 50%">
                                        </td>
                                        <td style="color: #2a07b3;font-size: 15px">{{ $wish->dish->full_price }}</td>
                                        <td>
                                            <a href="{{ route('wish_destroy',$wish->id) }}" style="color: #2a07b3;font-size: 15px" class="btn">
                                                <i class="fa fa-trash" style="font-size: 15px; color: red"></i> Remove</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="text-align: center; color: #0b2e13; font-size: 24px" >Oops... No Wishlist Found</td>
                                    </tr>
                                @endforelse

                                </tbody>

                                {{-- <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </tfoot> --}}

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
