@extends('layouts.site')
@Section('title','Cart')
@Section('main')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../public/siteclient/images/bg/5.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Cart</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 1; ?>
                                @foreach ($cart->items as $key =>$item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="{{route('view',['id'=>$item['id']])}}"><img src="{{url('public/uploads')}}/{{$item['image']}}" alt="product img" /></a>
                                    </td>
                                    <td class="product-name"><a href="#">{{$item['name']}}</a></td>
                                    <td class="product-price"><span class="amount">{{$item['price']}}.000VND</span></td>
                                    <td class="product-price">
                                        <input type="hidden" class="product_id" value="{{$item['id']}}">
                                                <span class="dec qtybtn" data="{{$key}}">-</span>           
                                            <input class="text-center" type="text" id="cartqty_{{$key}}" value="{{$item['quantity'] }}">
                                                <span class="inc qtybtn" data="{{$key}}">+</span>
                                    </td>
                                    <td class="product-subtotal">{{$item['price']*$item['quantity']}}.000VND</td>
                                    <td class="product-remove"><a href="{{route('cart.remove',['id'=>$item['id']])}}">X</a></td>
                                </tr>
                                <?php $n++ ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="buttons-cart">
                                <a href="{{route('cart.clear')}}">Clear All</a>
                                <a href="{{route('home.shop')}}">Continue Shopping</a>
                            </div>
                            <div class="coupon">
                                <h3>Coupon</h3>
                                <p>Enter your coupon code if you have one.</p>
                                <input type="text" placeholder="Coupon code" />
                                <input type="submit" value="Apply Coupon" />
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="cart_totals">
                                <h2>Cart Totals</h2>
                                <table>
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">{{$cart->total_price}}.000VND</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <ul id="shipping_method">
                                                    <li>
                                                        <input type="radio" />
                                                        <label>
                                                            Free Shipping
                                                        </label>
                                                    </li>
                                                    <li></li>
                                                </ul>
                                                <p><a class="shipping-calculator-button" href="#">Calculate Shipping</a></p>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">{{$cart->total_price}}.000VND</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{route('checkout')}}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
@stop()
@section('js')
<script>
    $('.qtybtn').click(function(){
        var key = $(this).attr('data');
        var cartqty = $('#cartqty_'+key).val();
        if($(this).hasClass('inc'))
        {
            $('#cartqty_'+key).val(parseInt(cartqty)+1)
            updatecart(key,parseInt(cartqty)+1);
        } else {
            $('#cartqty_'+key).val(parseInt(cartqty)-1)
            updatecart(key,parseInt(cartqty)-1);
        }
    });
    function updatecart(key,qty){
        $.ajax({
            url:"{{url('update')}}/"+key+"/"+qty,
            success:function(result){
                location.reload();
            }
        });
    }
</script>
@stop()