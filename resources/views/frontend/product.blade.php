@extends('frontend.layout.main')

@section('main-content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- BSTORE-BREADCRUMB START -->
            <div class="bstore-breadcrumb">
                <a href="/frontend/index.html">Trang chủ<span><i class="fa fa-caret-right"></i> </span> </a>
                <span> <i class="fa fa-caret-right"> </i> </span>
                <a href="{{ route('shop.category',['slug'=>$product->category->slug]) }}">{{ $product->category->slug }} </a>
                <span>{{ $product->slug }}</span>
            </div>
            <!-- BSTORE-BREADCRUMB END -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <!-- SINGLE-PRODUCT-DESCRIPTION START -->
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                    <div class="single-product-view">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="thumbnail_1">
                                <div class="single-product-image">
                                    <img src=" {{ asset($product->image) }}" alt="single-product-image" style="width: 100%; height: 100%" />
                                    <a class="new-mark-box" href="/frontend/#">new</a>
                                    <a class="fancybox" href="{{ asset($product->image) }}" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="thumbnail_2">
                                <div class="single-product-image">
                                    <img src="/frontend/img/product/sale/3.jpg" alt="single-product-image" />
                                    <a class="new-mark-box" href="/frontend/#">new</a>
                                    <a class="fancybox" href="/frontend/img/product/sale/3.jpg" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="thumbnail_3">
                                <div class="single-product-image">
                                    <img src="/frontend/img/product/sale/9.jpg" alt="single-product-image" />
                                    <a class="new-mark-box" href="/frontend/#">new</a>
                                    <a class="fancybox" href="/frontend/img/product/sale/9.jpg" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="thumbnail_4">
                                <div class="single-product-image">
                                    <img src="/frontend/img/product/sale/13.jpg" alt="single-product-image" />
                                    <a class="new-mark-box" href="/frontend/#">new</a>
                                    <a class="fancybox" href="/frontend/img/product/sale/13.jpg" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="thumbnail_5">
                                <div class="single-product-image">
                                    <img src="/frontend/img/product/sale/7.jpg" alt="single-product-image" />
                                    <a class="new-mark-box" href="/frontend/#">new</a>
                                    <a class="fancybox" href="/frontend/img/product/sale/7.jpg" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
                                </div>
                            </div>
                            <div class="tab-pane" id="thumbnail_6">
                                <div class="single-product-image">
                                    <img src="/frontend/img/product/sale/12.jpg" alt="single-product-image" />
                                    <a class="new-mark-box" href="/frontend/#">new</a>
                                    <a class="fancybox" href="/frontend/img/product/sale/12.jpg" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="select-product">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs select-product-tab bxslider">
                            <li class="active">
                                <a href="/frontend/#thumbnail_1" data-toggle="tab"><img src="/frontend/img/product/sidebar_product/1.jpg" alt="pro-thumbnail" /></a>
                            </li>
                            <li>
                                <a href="/frontend/#thumbnail_2" data-toggle="tab"><img src="/frontend/img/product/sidebar_product/2.jpg" alt="pro-thumbnail" /></a>
                            </li>
                            <li>
                                <a href="/frontend/#thumbnail_3" data-toggle="tab"><img src="/frontend/img/product/sidebar_product/3.jpg" alt="pro-thumbnail" /></a>
                            </li>
                            <li>
                                <a href="/frontend/#thumbnail_4" data-toggle="tab"><img src="/frontend/img/product/sidebar_product/4.jpg" alt="pro-thumbnail" /></a>
                            </li>
                            <li>
                                <a href="/frontend/#thumbnail_5" data-toggle="tab"><img src="/frontend/img/product/sidebar_product/5.jpg" alt="pro-thumbnail" /></a>
                            </li>
                            <li>
                                <a href="/frontend/#thumbnail_6" data-toggle="tab"><img src="/frontend/img/product/sidebar_product/6.jpg" alt="pro-thumbnail" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                    <div class="single-product-descirption">
                        <h2>{{ $product->name }}</h2>

                        <div class="single-product-price">
                            <h2>{{ number_format($product->sale,0,",",".") }}₫ </h2>
                        </div>

                        @if($product->stock > 0)
                            <div class="single-product-desc">
                                <div class="product-in-stock">
                                    <p><span>Còn hàng</span></p>
                                </div>
                            </div>
                        @endif

                        <div class="single-product-quantity">
                            <p class="small-title">Số lượng</p>
                            <div class="cart-quantity">
                                <div class="cart-plus-minus-button single-qty-btn">
                                    <input class="cart-plus-minus sing-pro-qty" type="text" name="qtybutton" value="0">
                                </div>
                            </div>
                        </div>
                        <div class="single-product-size">
                            <p class="small-title">kích thước </p>
                            <select name="product-size" id="product-size">
                                <option value="">S</option>
                                <option value="">M</option>
                                <option value="">L</option>
                            </select>
                        </div>
                        <div class="single-product-color">
                            <p class="small-title">Màu sắc </p>
                            <a href="/frontend/#"><span></span></a>
                            <a class="color-blue" href="/frontend/#"><span></span></a>
                        </div>
                        <div class="single-product-add-cart">
                            <a class="add-cart-text" title="Add to cart" href="/frontend/#">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SINGLE-PRODUCT-DESCRIPTION END -->
            <!-- SINGLE-PRODUCT INFO TAB START -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="product-more-info-tab">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs more-info-tab">
                            <li class="active">
                                <a href="#data_sheet" data-toggle="tab" aria-expanded="false" class="tab-pane">Thông số</a>
                            </li>
                            <li >
                                <a href="#moreinfo" data-toggle="tab" aria-expanded="true" class="tab-pane">Thông tin chi tiết</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="data_sheet">
                                <div class="tab-data_sheet">
                                    {!! $product->summary !!}
                                </div>
                            </div>
                            <div class="tab-pane" id="moreinfo">
                                <div class="tab-description">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SINGLE-PRODUCT INFO TAB END -->
            <!-- RELATED-PRODUCTS-AREA START -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="left-title-area">
                        <h2 class="left-title">Những sản phẩm tương tự</h2>
                    </div>
                </div>
                <div class="related-product-area featured-products-area">
                    <div class="col-sm-12">
                        <div class=" row">
                            <!-- RELATED-CAROUSEL START -->
                            <div class="related-product">
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/3.jpg" alt="product-image" /></a>
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
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Faded Short T-sh...</a>
                                            <div class="price-box">
                                                <span class="price">$16.51</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/1.jpg" alt="product-image" /></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Blouse</a>
                                            <div class="price-box">
                                                <span class="price">$22.95</span>
                                                <span class="old-price">$27.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/9.jpg" alt="product-image" /></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Printed Dress</a>
                                            <div class="price-box">
                                                <span class="price">$23.40</span>
                                                <span class="old-price">$26.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/5.jpg" alt="product-image" /></a>
                                            <div class="overlay-content">
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
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Printed Dress</a>
                                            <div class="price-box">
                                                <span class="price">$50.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/12.jpg" alt="product-image" /></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Printed Summer Dr...</a>
                                            <div class="price-box">
                                                <span class="price">$28.98</span>
                                                <span class="old-price">$30.51</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/13.jpg" alt="product-image" /></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Printed Summer</a>
                                            <div class="price-box">
                                                <span class="price">$30.50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/7.jpg" alt="product-image" /></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Printed Chiffon Dr...</a>
                                            <div class="price-box">
                                                <span class="price">$16.40</span>
                                                <span class="old-price">$20.50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/11.jpg" alt="product-image" /></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Printed Dress</a>
                                            <div class="price-box">
                                                <span class="price">$26.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/10.jpg" alt="product-image" /></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                    <i class="fa fa-star-half-empty"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Printed Dress</a>
                                            <div class="price-box">
                                                <span class="price">$26.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/2.jpg" alt="product-image" /></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Blouse</a>
                                            <div class="price-box">
                                                <span class="price">$27.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/4.jpg" alt="product-image" /></a>
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
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Faded Short Sle...</a>
                                            <div class="price-box">
                                                <span class="price">$16.51</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/6.jpg" alt="product-image" /></a>
                                        </div>
                                        <div class="product-info">
                                            <div class="customar-comments-box">
                                                <div class="rating-box">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="review-box">
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Printed Chiffon Dr...</a>
                                            <div class="price-box">
                                                <span class="price">$16.40</span>
                                                <span class="old-price">$20.50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                                <div class="item">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="/frontend/#"><img src="/frontend/img/product/sale/8.jpg" alt="product-image" /></a>
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
                                                    <span>Đánh giá</span>
                                                </div>
                                            </div>
                                            <a href="/frontend/#">Printed Dress</a>
                                            <div class="price-box">
                                                <span class="price">$26.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- SINGLE-PRODUCT-ITEM END -->
                                <!-- SINGLE-PRODUCT-ITEM START -->
                            </div>
                            <!-- RELATED-CAROUSEL END -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- RELATED-PRODUCTS-AREA END -->
        </div>
        <!-- RIGHT SIDE BAR START -->
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <!-- SINGLE SIDE BAR START -->
            <div class="single-product-right-sidebar">
                <h2 class="left-title">CÁC SẢN PHẨM ĐÃ XEM</h2>
                <ul>
                    @foreach($viewedProducts as $product)
                    <li>
                        <a href="{{ route('shop.product',['slug' => $product->slug]) }}"><img src="{{ asset($product->image) }}" alt="" width="100" style="border: 0px" /></a>
                        <div class="r-sidebar-pro-content">
                            <h5><a href="{{ route('shop.product',['slug' => $product->slug]) }}">{{ $product->name }}</a></h5>
                            <p style="color: red">{{ number_format($product->sale,0,",",".") }} ₫ </p>
                        </div>
                    </li>
                @endforeach
                </ul>
            </div>
            <!-- SINGLE SIDE BAR END -->
        </div>
        <!-- SINGLE SIDE BAR END -->
    </div>
@endsection
