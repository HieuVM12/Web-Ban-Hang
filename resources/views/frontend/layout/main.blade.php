<!doctype html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/img/favicon.png">

    <!-- FONTS
		============================================ -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&amp;subset=latin,latin-ext'
        rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/animate.css">

    <!-- FANCYBOX CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/jquery.fancybox.css">

    <!-- BXSLIDER CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/jquery.bxslider.css">

    <!-- MEANMENU CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/meanmenu.min.css">

    <!-- JQUERY-UI-SLIDER CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/jquery-ui-slider.css">

    <!-- NIVO SLIDER CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/nivo-slider.css">

    <!-- OWL CAROUSEL CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/owl.carousel.css">

    <!-- OWL CAROUSEL THEME CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/owl.theme.css">

    <!-- BOOTSTRAP CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">

    <!-- FONT AWESOME CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/font-awesome.min.css">

    <!-- NORMALIZE CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/normalize.css">

    <!-- MAIN CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/main.css">

    <!-- STYLE CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/style.css">

    <!-- RESPONSIVE CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/responsive.css">

    <!-- IE CSS
		============================================ -->
    <link rel="stylesheet" href="/frontend/css/ie.css">

    <!-- MODERNIZR JS
		============================================ -->
    <script src="/frontend/js/vendor/modernizr-2.6.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="/frontend/http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

    <!-- Add your site or application content here -->

    <!-- HEADER-TOP START -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- HEADER-LEFT-MENU START -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-left-menu">
                    </div>
                </div>
                <!-- HEADER-LEFT-MENU END -->
                <!-- HEADER-RIGHT-MENU START -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-right-menu">
                        <nav>
                            <ul class="list-inline">
                                <li><a href="{{ route('shop.articles')}}">Tin tức</a></li>
                                <li><a href="{{ route('shop.contact') }}">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- HEADER-RIGHT-MENU END -->
            </div>
        </div>
    </div>
    <!-- HEADER-TOP END -->
    <!-- HEADER-MIDDLE START -->
    <section class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- LOGO START -->
                    <div class="logo">
                        <a href="/frontend/index.html"><img src="/frontend/img/logo.png" alt="bstore logo" /></a>
                    </div>
                    <!-- LOGO END -->
                    <!-- HEADER-RIGHT-CALLUS END -->
                    <!-- CATEGORYS-PRODUCT-SEARCH START -->
                    <div class="categorys-product-search">
                        <form action="{{ route('shop.search') }}" method="get" class="search-form-cat">
                            <div class="search-product ">

                                <input type="text" class="form-control search-form" name="tu-khoa"
                                    placeholder="Nhập từ khóa tìm kiếm" />
                                <button class="search-button" value="Search" name="s" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- CATEGORYS-PRODUCT-SEARCH END -->
                </div>
            </div>
        </div>
    </section>
    <!-- HEADER-MIDDLE END -->
    <!-- MAIN-MENU-AREA START -->
    <header class="main-menu-area">
        <div class="container">
            <div class="row">
                <!-- SHOPPING-CART START -->
                <!-- SHOPPING-CART END -->
                <!-- MAINMENU START -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding-right menuarea">
                    <div class="mainmenu">
                        <nav>
                            <ul class="list-inline mega-menu">
                                <li><a href="/">Trang chủ</a></li>
                                @foreach($categories as $parent_category)
                                @if($parent_category->parent_id == 0 )
                                <li class="" style="position:relative"><a
                                        href="{{ route('shop.category', ['slug' => $parent_category->slug]) }}">{{
                                        $parent_category->name }}</a>
                                    <!-- DROPDOWN MENU START -->
                                    <div class="home-var-menu" style="left: 0px">
                                        <ul class="home-menu">
                                            @foreach($categories as $child_category)
                                            @if($child_category->parent_id == $parent_category->id)
                                            <li><a
                                                    href="{{ route('shop.category', ['slug' => $child_category->slug]) }}">{{
                                                    $child_category->name }}</a></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- DROPDOWN MENU END -->
                                </li>
                                @endif
                                @endforeach
                                <li><a href="{{ route('shop.contact') }}">Liên Hệ</a></li>
                                <li><a href="{ route('shop.articles') }}">Tin tức</a></li>
                                <div class="shopping-cart-out pull-right">
                                    <div class="shopping-cart">
                                        <a class="shop-link" href="cart.html" title="View my shopping cart">
                                            <i class="fa fa-shopping-cart cart-icon"></i>
                                            <b>My Cart</b>
                                            <span class="ajax-cart-quantity" id="total-quanty-show">
                                                @if(Session::has("Cart") != null)
                                                    {{Session::get('Cart')->totalQuanty}}
                                                @else
                                                    0
                                                @endif
                                            </span>
                                        </a>
                                        <div class="shipping-cart-overly">
                                            <div id="change-item-cart">
                                                @if(Session::has("Cart") != null)
                                                @foreach(Session::get('Cart')->products as $item)
                                                <div class="shipping-item">
                                                    <span class="cross-icon"><i data-id="{{$item['productInfo']['id']}}"
                                                            class="fa fa-times-circle"></i></span>
                                                    <div class="shipping-item-image">
                                                        <a href="#"><img src="{{asset($item['productInfo']['image'])}}"
                                                                style="height: 75px; width:75px"
                                                                alt="shopping image" /></a>
                                                    </div>
                                                    <div class="shipping-item-text">
                                                        <span><a href="#"
                                                                class="pro-cat">{{$item['productInfo']['name']}}</a></span>
                                                        <span></span>
                                                        <p>{{number_format($item['productInfo']['sale'])}}₫ x
                                                            {{$item['quanty']}}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="shipping-total-bill">
                                                    <div class="total-shipping-prices">
                                                        <span
                                                            class="shipping-total">{{number_format(Session::get('Cart')->totalPrice)}}₫</span>
                                                        <span>Total</span>
                                                    </div>
                                                </div>
                                                <div class="shipping-checkout-btn">
                                                    <a href="{{route('shop.ViewListCart')}}" style="margin-bottom: 5px">View cart <i
                                                            class="fa fa-chevron-right"></i></a>
                                                    <a href="checkout.html">Check out <i
                                                            class="fa fa-chevron-right"></i></a>
                                                </div>
                                                @else
                                                <p>Khong co san pham nao</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>

                        </nav>
                    </div>

                </div>
                <!-- MAINMENU END -->
            </div>
            <div class="row">
                <!-- MOBILE MENU START -->
                <div class="col-sm-12 mobile-menu-area">
                    <div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
                        <span class="mobile-menu-title">MENU</span>
                        <nav>
                            <ul>
                                <li><a href="/frontend/index.html">Home</a>
                                    <ul>
                                        <li><a href="/frontend/index.html">Home variation 1</a></li>
                                        <li><a href="/frontend/index-2.html">Home variation 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="/frontend/shop-gird.html">Women</a>
                                    <ul>
                                        <li><a href="/frontend/shop-gird.html">Tops</a>
                                            <ul>
                                                <li><a href="/frontend/shop-gird.html">T-Shirts</a></li>
                                                <li><a href="/frontend/shop-gird.html">Blouses</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/frontend/shop-gird.html">Dresses</a>
                                            <ul>
                                                <li><a href="/frontend/shop-gird.html">Casual Dresses</a></li>
                                                <li><a href="/frontend/shop-gird.html">Summer Dresses</a></li>
                                                <li><a href="/frontend/shop-gird.html">Evening Dresses</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                                <li><a href="/frontend/shop-gird.html">men</a>
                                    <ul>
                                        <li><a href="/frontend/shop-gird.html">Tops</a>
                                            <ul>
                                                <li><a href="/frontend/shop-gird.html">Sports</a></li>
                                                <li><a href="/frontend/shop-gird.html">Day</a></li>
                                                <li><a href="/frontend/shop-gird.html">Evening</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/frontend/shop-gird.html">Blouses</a>
                                            <ul>
                                                <li><a href="/frontend/shop-gird.html">Handbag</a></li>
                                                <li><a href="/frontend/shop-gird.html">Headphone</a></li>
                                                <li><a href="/frontend/shop-gird.html">Houseware</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/frontend/shop-gird.html">Accessories</a>
                                            <ul>
                                                <li><a href="/frontend/shop-gird.html">Houseware</a></li>
                                                <li><a href="/frontend/shop-gird.html">Home</a></li>
                                                <li><a href="/frontend/shop-gird.html">Health & Beauty</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="/frontend/shop-gird.html">clothing</a></li>
                                <li><a href="/frontend/shop-gird.html">tops</a></li>
                                <li><a href="/frontend/shop-gird.html">T-shirts</a></li>
                                <li><a href="/frontend/#">Delivery</a></li>
                                <li><a href="/frontend/about-us.html">About us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- MOBILE MENU END -->
            </div>
        </div>
    </header>
    <!-- MAIN-MENU-AREA END -->
    <!-- MAIN-CONTENT-SECTION START -->
    <section class="main-content-section">
        <div class="container">
            @yield('main-content')
        </div>
    </section>
    <!-- MAIN-CONTENT-SECTION END -->
    <!-- LATEST-NEWS-AREA START -->
    <section class="latest-news-area">
        <div class="container">
            <div class="row">
                <div class="latest-news-row">
                    <div class="center-title-area">
                        <h2 class="center-title"><a href="/frontend/#">latest news</a></h2>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <!-- LATEST-NEWS-CAROUSEL START -->
                            <div class="latest-news-carousel">
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                @foreach($articles as $article)
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="{{ route('shop.detailArticle',['slug' => $article->slug]) }}"><img
                                                    src="{{ asset($article->image) }}" alt="latest-post" /></a>
                                            <h2><a href="{{ route('shop.detailArticle',[ 'slug' => $article->slug]) }}">{{
                                                    $article->title }}</a></h2>
                                            <div class="read-more">
                                                <a href="{{ route('shop.detailArticle',['slug'=> $article->slug]) }}">Read
                                                    More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- LATEST-NEWS-AREA END -->
    <!-- BRAND-CLIENT-AREA START -->
    <section class="brand-client-area">
        <div class="container">
            <div class="row">
                <!-- BRAND-CLIENT-ROW START -->
                <div class="brand-client-row">
                    <div class="center-title-area">
                        <h2 class="center-title">BRAND & CLIENTS</h2>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <!-- CLIENT-CAROUSEL START -->
                            <div class="client-carousel">
                                <!-- CLIENT-SINGLE START -->
                                @foreach($brands as $brand)
                                <div class="item">
                                    <div class="single-client">
                                        <img src="{{ $brand->image }}" alt="brand-client" class="img-fluid">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- CLIENT-CAROUSEL END -->
                        </div>
                    </div>
                </div>
                <!-- BRAND-CLIENT-ROW END -->
            </div>
        </div>
    </section>
    <!-- BRAND-CLIENT-AREA END -->
    <section class="footer-top-area">
        <div class="container">
            <div class="footer-top-container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12">
                        <div class="footer-top-right-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <!-- FOTTER-MENU-WIDGET START -->
                                    <div class="fotter-menu-widget">
                                        <div class="single-f-widget">
                                            <h2>Categories</h2>
                                            <ul>
                                                @foreach($categories as $category)
                                                @if($category->parent_id==0)
                                                <li><a href="{{ route('shop.category', ['slug' => $category->slug]) }}"><i
                                                            class="fa fa-angle-double-right"></i>{{ $category->name
                                                        }}</a></li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- FOTTER-MENU-WIDGET END -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <!-- FOTTER-MENU-WIDGET START -->
                                    <div class="fotter-menu-widget">
                                        <div class="single-f-widget">
                                            <h2>Information</h2>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-angle-double-right"></i>New products</a>
                                                </li>
                                                <li><a href="{{ route('shop.contact')}}"><i
                                                            class="fa fa-angle-double-right"></i>Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- FOTTER-MENU-WIDGET END -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <!-- FOTTER-MENU-WIDGET START -->
                                    <div class="fotter-menu-widget">
                                        <div class="single-f-widget">
                                            <h2>My account</h2>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Sign in</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- FOTTER-MENU-WIDGET END -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/frontend/js/vendor/jquery-1.11.3.min.js"></script>

    <!-- fancybox js -->
    <script src="/frontend/js/jquery.fancybox.js"></script>

    <!-- bxslider js -->
    <script src="/frontend/js/jquery.bxslider.min.js"></script>

    <!-- meanmenu js -->
    <script src="/frontend/js/jquery.meanmenu.js"></script>

    <!-- owl carousel js -->
    <script src="/frontend/js/owl.carousel.min.js"></script>

    <!-- nivo slider js -->
    <script src="/frontend/js/jquery.nivo.slider.js"></script>

    <!-- jqueryui js -->
    <script src="/frontend/js/jqueryui.js"></script>

    <!-- bootstrap js -->
    <script src="/frontend/js/bootstrap.min.js"></script>

    <!-- wow js -->
    <script src="/frontend/js/wow.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <!-- Google Map js -->
    <script src="/frontend/https://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var mapOptions = {
                zoom: 8,
                scrollwheel: false,
                center: new google.maps.LatLng(35.149868, -90.046678)
            };
            var map = new google.maps.Map(document.getElementById('googleMap'),
                mapOptions);
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                map: map
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <!-- main js -->
    <script src="/frontend/js/main.js"></script>
    <script>
        function AddCart(id) {
            $.ajax({
                url: '/AddCart/' + id,
                type: 'GET',
            }).done(function (response) {
                RenderCart(response);
                alertify.success('Đã thêm sản phẩm');
            });
        }
        $('#change-item-cart').on("click", ".cross-icon i", function () {
            $.ajax({
                url: '/DeleteItemCart/' + $(this).data("id"),
                type: 'GET',
            }).done(function (response) {
                RenderCart(response);
                alertify.error('Đã xóa sản phẩm');
            });
        });
        function RenderCart(response){
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            $("#total-quanty-show").text($('#total-quanty-cart').val());
        }
        function DeleteItemListCart(id){
            $.ajax({
                url: '/DeleteItemListCart/' + id,
                type: 'GET',
            }).done(function (response) {
                RenderListCart(response);
                alertify.error('Đã xóa sản phẩm');
            });
        }
        function RenderListCart(response){
            $("#list-cart").empty();
            $("#list-cart").html(response);
        }
    </script>
</body>


</html>