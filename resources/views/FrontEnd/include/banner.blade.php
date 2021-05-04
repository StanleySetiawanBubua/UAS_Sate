<div class="banner">
    <!-- header -->
    <div class="header">
        <div class="w3ls-header"><!-- header-one -->
            <div class="container">
                <div class="w3ls-header-left">
                    <p>Free home delivery at your doorstep</p>
                </div>
                <div class="w3ls-header-right">
                    <ul>
                        <li class="head-dpdn">
                            <i class="fa fa-phone" aria-hidden="true"></i> Call us: +08 01521328545
                        </li>

                        @if(Session::get('customer_id'))
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

                        @if(Session::get('customer_id'))

                            <li class="head-dpdn" title="View Profile">
                                <a href="{{ route('customer_profile') }}">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    {{ Session::get('customer_name') }}
                                </a>
                            </li>
                        @else
                            <li class="head-dpdn">
                                <a href="#sigup-modal" data-toggle="modal">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                    Register
                                </a>
                            </li>
                        @endif

                        <li class="head-dpdn">
                            <a href="{{ route('offers')}}"><i class="fas fa-first-order-alt" aria-hidden="true"></i> My Wishlist</a>
                        </li>

                        <li class="head-dpdn">
                            <a href="{{ route('offers')}}"><i class="fa fa-gift" aria-hidden="true"></i> Offers</a>
                        </li>
                        <li class="head-dpdn">
                            <a href="{{ route('help')}}"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //header-one -->
        <!-- navigation -->
        <div class="navigation agiletop-nav">
            <div class="container">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header w3l_logo">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <h1><a class="active" href="{{ url('/') }}">Food Catering Service <span>The Best Food Collection!!!</span></a></h1>
                    </div>

                                      {{-- Menu --}}

                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav navbar-right">
                            {{-- @foreach($categories as $category)
                            <li>
                                <a class="{{ Route::currentRouteName('category_dish') ? 'active' : '' }}" href="{{ route('category_dish', ['category_id'=>$category->category_id]) }}" >
                                    {{$category->category_name}}
                                </a>
                            </li>
                            @endforeach --}}


                         <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <b class="caret"></b></a>
									<ul class="dropdown-menu multi-column columns-3 bg-danger">
										<div class="row ">
											<div class="col-sm-12">
												<ul class="multi-column-dropdown ">
													<h6>Food Type</h6>
													  @foreach($categories as $category)
                            <li>
                                <a class="{{ Route::currentRouteName('category_dish') ? 'active' : '' }}" href="{{ route('category_dish', ['category_id'=>$category->category_id]) }}" >
                                    {{$category->category_name}}
                                </a>
                            </li>
                            @endforeach
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
                            <li><a href="{{ route('about')}}" class="">About Us</a></li>
                            <li><a href="{{ route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>







                    <div class="cart cart box_1">
                        <a href="{{ route('cart_show') }}" class="last">
                            <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- //navigation -->
    </div>
    <!-- //header-end -->
    <!-- banner-text -->
    <div class="banner-text">
        <div class="container">
            <h2>Delicious Home Made Food from the <br> <span>Best Chefs For you !!!</span></h2>


            {{-- <div class="agileits_search">
                <form action="#" method="post">
                    <input name="Search" type="text" placeholder="Enter Your Area Name" required="">
                    <select id="agileinfo_search" name="agileinfo_search" required="">
                        <option value="">Popular Cities</option>
                        <option value="navs">New York</option>
                        <option value="quotes">Los Angeles</option>
                        <option value="videos">Chicago</option>
                        <option value="news">Phoenix</option>
                        <option value="notices">Fort Worth</option>
                        <option value="all">Other</option>
                    </select>
                    <input type="submit" value="Search">
                </form>
            </div> --}}


        </div>
    </div>
</div>
