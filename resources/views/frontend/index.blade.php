

@extends('frontend.layout.main')

@section('main-content')
    <div class="row">
        <!-- MAIN-SLIDER-AREA START -->
        <div class="main-slider-area">
            <!-- SLIDER-AREA START -->
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="slider-area">
                    <div id="wrapper">
                        <div class="slider-wrapper">
                            <div id="mainSlider" class="nivoSlider" >
                                @foreach($banners as $banner)
                                    <img src="{{asset($banner->image)}}" style="height: 410px" alt="main slider" title="#htmlcaption"/>
                                @endforeach
                            </div>
                           {{-- <div id="htmlcaption" class="nivo-html-caption slider-caption">
                               <div class="slider-progress"></div>
                               <div class="slider-cap-text slider-text1">
                                   <div class="d-table-cell">
                                        <h2 class="animated bounceInDown">BEST THEMES</h2>
                                       <p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna aliquam erat volutpat.</p>
                                        <a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="/frontend/#">Read More <i class="fa fa-caret-right"></i></a>
                                    </div>
                               </div>
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- SLIDER-AREA END -->
            <!-- SLIDER-RIGHT START -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="slider-right zoom-img m-top">
                    <a href="/frontend/#"><img class="img-responsive" src="/frontend/img/product/cms11.jpg" alt="sidebar left" /></a>
                </div>
            </div>
            <!-- SLIDER-RIGHT END -->
        </div>
        <!-- MAIN-SLIDER-AREA END -->
    </div>
    <!-- TOW-COLUMN-PRODUCT START -->
    @foreach($data as $row)
        <div class="row">
            <!-- FEATURED-PRODUCTS-AREA START -->
            <div class="featured-products-area">
                <div class="center-title-area">
                    <h2 class="center-title">{{ $row['name'] }}</h2>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <!-- FEARTURED-CAROUSEL START -->
                        <div class="feartured-carousel">
                            @foreach($row['products'] as $product)
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="{{ route('shop.product',['slug' => $product->slug]) }}"><img src="{{ asset($product->image) }} " style="height: 204px; width: 204px;" alt="product-image" /></a>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="/frontend/#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                    <li><a onclick="AddCart({{$product->id}})" href="javascript:" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                    <li><a href="/frontend/#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="/frontend/#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>1 Review (s)</span>
                                                </div>
                                            </div>
                                            <a href="{{ route('shop.product',['slug' => $product->slug]) }}">{{ $product->name }}</a>
                                            <div class="price-box">
                                                <span class="price">{{ number_format($product->sale,0,",",".") }} ₫ </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- FEARTURED-CAROUSEL END -->
                    </div>
                </div>
            </div>
            <!-- FEATURED-PRODUCTS-AREA END -->
        </div>
    @endforeach
    <div class="row">
        <!-- IMAGE-ADD-AREA START -->
        <div class="image-add-area">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <!-- ONEHALF-ADD START -->
                <div class="onehalf-add-shope zoom-img">
                    <a href="/frontend/#"><img src="/frontend/img/product/one-helf1.jpg" alt="shope-add" /></a>
                </div>
                <!-- ONEHALF-ADD END -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <!-- ONEHALF-ADD START -->
                <div class="onehalf-add-shope zoom-img">
                    <a href="/frontend/#"><img src="/frontend/img/product/one-helf2.jpg" alt="shope-add" /></a>
                </div>
                <!-- ONEHALF-ADD END -->
            </div>
        </div>
        <!-- IMAGE-ADD-AREA END -->
    </div>
@endsection
