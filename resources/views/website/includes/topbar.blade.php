<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        @auth
                            <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                        @endauth
                        <li><a href="{{ route('wishlist.index') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="{{ route('cart.index') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                        @auth
                            <li><a onclick="event.preventDefault();  document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="icon fa fa-sign-out"></i>Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <li><a href="{{ route('website.login') }}"><i class="icon fa fa-lock"></i>Login</a></li>
                        @endauth
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                data-toggle="dropdown"><span class="value">BDT </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">BDT</a></li>
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown"
                                data-toggle="dropdown"><span class="value">Bangla </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Bangla</a></li>
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{ route('website.home') }}"> <img src="{{ asset('frontend') }}/images/logo.png"
                                alt="logo"> </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            @php
                                                $categories = App\Models\Category::where('pro_cat_status', 1)->where('pro_cat_parent', NULL)->get();
                                            @endphp
                                            @foreach ($categories as $category)
                                            <li class="menu-header">{{ $category->pro_cat_name }}</li>
                                            @php
                                                $sub_catagory = App\Models\Category::where('pro_cat_status', 1)->where('pro_cat_parent', $category->pro_cat_id)->get();
                                                $sub_cat_count = App\Models\Category::where('pro_cat_status', 1)->where('pro_cat_parent', $category->pro_cat_id)->get()->count();
                                            @endphp
                                            @if ($sub_cat_count != 0)
                                            @foreach ($sub_catagory as $sub_data)
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                href="category.html">- {{ $sub_data->pro_cat_name }}</a></li>
                                            @endforeach
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    @php
                        $cartCollection = Cart::getContent();
                    @endphp
                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count">{{ Cart::getTotalQuantity() }}</span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span> <span
                                        class="total-price"> <span class="sign">$</span><span
                                            class="value">{{ Cart::getSubTotal() }}</span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="cart-item product-summary">
                                    @foreach ($cartCollection as $cart_data)
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="{{ asset('backend/uploads/product/'.$cart_data->attributes->product_image) }}" alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index8a95.html?page-detail">{{ $cart_data->name }}</a>
                                            </h3>
                                            <div class="price">${{ $cart_data->price }}</div>
                                        </div>
                                        <div class="col-xs-1 action"> <a href="{{ route('cart.destroy',$cart_data->id) }}"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span
                                            class='price'>${{ Cart::getSubTotal(); }}</span> </div>
                                    <div class="clearfix"></div>
                                    <a href="{{ route('cart.index') }}"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown"
                                        class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
                                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                        class="dropdown-toggle" data-toggle="dropdown">Clothing</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">Men</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Dresses</a></li>
                                                            <li><a href="#">Shoes </a></li>
                                                            <li><a href="#">Jackets</a></li>
                                                            <li><a href="#">Sunglasses</a></li>
                                                            <li><a href="#">Sport Wear</a></li>
                                                            <li><a href="#">Blazers</a></li>
                                                            <li><a href="#">Shirts</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.col -->

                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">Women</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Handbags</a></li>
                                                            <li><a href="#">Jwellery</a></li>
                                                            <li><a href="#">Swimwear </a></li>
                                                            <li><a href="#">Tops</a></li>
                                                            <li><a href="#">Flats</a></li>
                                                            <li><a href="#">Shoes</a></li>
                                                            <li><a href="#">Winter Wear</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.col -->

                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">Boys</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Toys & Games</a></li>
                                                            <li><a href="#">Jeans</a></li>
                                                            <li><a href="#">Shirts</a></li>
                                                            <li><a href="#">Shoes</a></li>
                                                            <li><a href="#">School Bags</a></li>
                                                            <li><a href="#">Lunch Box</a></li>
                                                            <li><a href="#">Footwear</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.col -->

                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <h2 class="title">Girls</h2>
                                                        <ul class="links">
                                                            <li><a href="#">Sandals </a></li>
                                                            <li><a href="#">Shorts</a></li>
                                                            <li><a href="#">Dresses</a></li>
                                                            <li><a href="#">Jwellery</a></li>
                                                            <li><a href="#">Bags</a></li>
                                                            <li><a href="#">Night Dress</a></li>
                                                            <li><a href="#">Swim Wear</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.col -->

                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                        <img class="img-responsive"
                                                            src="{{ asset('frontend') }}/images/banners/top-menu-banner.jpg"
                                                            alt="">
                                                    </div>
                                                    <!-- /.yamm-content -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown mega-menu">
                                    <a href="category.html" data-hover="dropdown" class="dropdown-toggle"
                                        data-toggle="dropdown">Electronics <span
                                            class="menu-label hot-menu hidden-xs">hot</span> </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">
                                                    @php
                                                        $categories = App\Models\Category::where('pro_cat_status', 1)->where('pro_cat_parent', null)->limit(4)->get();
                                                    @endphp
                                                    @foreach ($categories as $category)
                                                    @php
                                                        $sub_cat_count = App\Models\Category::where('pro_cat_status', 1)->where('pro_cat_parent', $category->pro_cat_id)->get()->count();
                                                        $sub_category = App\Models\Category::where('pro_cat_status', 1)->where('pro_cat_parent', $category->pro_cat_id)->get();
                                                    @endphp
                                                    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                        <h2 class="title">{{ $category->pro_cat_name }}</h2>
                                                        <ul class="links">
                                                            @if ($sub_cat_count != 0)
                                                                @foreach ($sub_category as $child)
                                                                <li><a href="#">{{ $child->pro_cat_name }}</a></li>
                                                                @endforeach
                                                            @else
                                                            Not Found!
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    <!-- /.col -->
                                                    @endforeach

                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner">
                                                        <a href="#"><img alt=""
                                                                src="{{ asset('frontend') }}/images/banners/banner-side.png"></a>
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.yamm-content -->
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown hidden-sm"> <a href="category.html">Health & Beauty <span
                                            class="menu-label new-menu hidden-xs">new</span> </a> </li>
                                <li class="dropdown hidden-sm"> <a href="category.html">Watches</a> </li>
                                <li class="dropdown"> <a href="contact.html">Jewellery</a> </li>
                                <li class="dropdown"> <a href="contact.html">Shoes</a> </li>
                                <li class="dropdown"> <a href="contact.html">Kids & Girls</a> </li>
                                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
