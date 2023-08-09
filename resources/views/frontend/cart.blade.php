@if(Session::has("Cart") != null)
@foreach(Session::get('Cart')->products as $item)
    <div class="shipping-item">
        <span class="cross-icon"><i data-id="{{$item['productInfo']['id']}}"  class="fa fa-times-circle"></i></span>
        <div class="shipping-item-image">
            <a href="#"><img src="{{asset($item['productInfo']['image'])}}" style="height: 75px; width:75px" alt="shopping image" /></a>
        </div>
        <div class="shipping-item-text">
            <span><a href="#" class="pro-cat">{{$item['productInfo']['name']}}</a></span>
            <span></span>
            <p>{{number_format($item['productInfo']['sale'])}}₫ x {{$item['quanty']}}</p>
        </div>
    </div>
@endforeach  
    <div class="shipping-total-bill">
        <div class="total-shipping-prices">
            <span class="shipping-total">{{number_format(Session::get('Cart')->totalPrice)}}₫</span>
            <span>Total</span>
            <input type="number" id='total-quanty-cart' value="{{Session::get('Cart')->totalQuanty}}" hidden>
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
<input type="number" id='total-quanty-cart' value="0" hidden>
@endif