@extends('frontend.layout.main')

@section('main-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- BSTORE-BREADCRUMB START -->
        <div class="bstore-breadcrumb">
            <a href="/frontend/index.html">HOME</a>
            <span><i class="fa fa-caret-right	"></i></span>
            <span>Your shopping cart</span>
        </div>
        <!-- BSTORE-BREADCRUMB END -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- SHOPPING-CART SUMMARY START -->
        <h2 class="page-title">Shopping-cart summary <span class="shop-pro-item">Your shopping cart contains: 2
                products</span></h2>
        <!-- SHOPPING-CART SUMMARY END -->
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- SHOPING-CART-MENU START -->
        <div class="shoping-cart-menu">
            <ul class="step">
                <li class="step-current first">
                    <span>01. Summary</span>
                </li>
                <li class="step-todo second">
                    <span>02. Sign in</span>
                </li>
                <li class="step-todo third">
                    <span>03. Address</span>
                </li>
                <li class="step-todo four">
                    <span>04. Shipping</span>
                </li>
                <li class="step-todo last" id="step_end">
                    <span>05. Payment</span>
                </li>
            </ul>
        </div>
        <!-- SHOPING-CART-MENU END -->
        <!-- CART TABLE_BLOCK START -->
        <div class="table-responsive" id="list-cart">
            @if(Session::has("Cart") != null)
            <table class="table table-bordered" id="cart-summary">
                <thead>
                    <tr>
                        <th class="cart-product">Product</th>
                        <th class="cart-description">Description</th>
                        <th class="cart-avail text-center">Availability</th>
                        <th class="cart-unit text-right">Unit price</th>
                        <th class="cart_quantity text-center">Qty</th>
                        <th class="cart-total text-right">Total</th>
                        <th class="cart-delete">Save</th>
                        <th class="cart-delete">Delete</th>
                    </tr>
                </thead>
                @foreach(Session::get('Cart')->products as $item)
                <tbody>

                    <tr>
                        <td class="cart-product">
                            <a href="/frontend/#"><img alt="Blouse" src="{{asset($item['productInfo']['image'])}}" style="height: 100px ; width: 100px "></a>
                        </td>
                        <td class="cart-description">
                            <p class="product-name"><a href="/frontend/#">{{$item['productInfo']['name']}}</a></p>
                            <small>SKU : demo_1</small>
                            <small><a href="/frontend/#">Size : S, Color : Orange</a></small>
                        </td>
                        <td class="cart-avail"><span class="label label-success">In stock</span></td>
                        <td class="cart-unit">
                            <ul class="price text-right">
                                <li class="price">{{number_format($item['productInfo']['sale'])}}₫</li>
                            </ul>
                        </td>
                        <td class="cart_quantity text-center">
                            <div class="cart-plus-minus-button">
                                <input class="cart-plus-minus" type="text" name="qtybutton" value="{{$item['quanty']}}">
                            </div>
                        </td>
                        <td class="cart-total">
                            <span class="price">{{number_format($item['sale'])}}₫</span>
                        </td>
                        <td class="cart-delete text-center">
                            <span>
                                <button type="button" class="btn btn-primary">Save</button>
                            </span>
                        </td>
                        <td class="cart-delete text-center">
                            <span>
                                <button type="button" class="btn btn-primary"
                                    onclick="DeleteItemListCart({{$item['productInfo']['id']}})">Delete</button>
                            </span>
                        </td>
                    </tr>

                    @endforeach
                <tfoot>
                    <tr class="cart-total-price">
                        <td class="cart_voucher" colspan="3" rowspan="4"></td>
                        <td class="text-right" colspan="3">Total products</td>
                        <td id="total_product" class="price" colspan="1">
                            {{number_format(Session::get('Cart')->totalPrice)}}₫</td>
                    </tr>
                </tfoot>
            </table>
            @else
            <p>Khong co san pham nao</p>
            <!-- TABLE END -->
            @endif
        </div>
        <!-- CART TABLE_BLOCK END -->
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- RETURNE-CONTINUE-SHOP START -->
        <a href="/frontend/index.html" class="continueshoping"><i class="fa fa-chevron-left"></i>Continue shopping</a>
        <a href="/frontend/checkout-signin.html" class="procedtocheckout">Proceed to checkout<i
                class="fa fa-chevron-right"></i></a>
    </div>
</div>
</div>
@endsection