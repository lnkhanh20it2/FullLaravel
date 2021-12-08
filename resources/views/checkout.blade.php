@extends('layouts.site')
@Section('title','Checkout')
@Section('main')
<!-- Start Cart Panel -->
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(public/siteclient/images/bg/2.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Checkout</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<section class="our-checkout-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="ckeckout-left-sidebar">
                    <!-- Start Checkbox Area -->
                    <div class="checkout-form">
                        <h2 class="section-title-3">Billing details</h2>
                        <div class="checkout-form-inner">
                            <form action="" method="post">
                                @csrf
                                <div class="single-checkout-box">
                                    <input type="text" name="name" value="{{Auth::guard('cus')->user()->name}}" placeholder="Name*">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                    <input type="email" name="email" value="{{Auth::guard('cus')->user()->email}}" placeholder="Email*">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="single-checkout-box">
                                    <input type="text" name="phone" value="{{Auth::guard('cus')->user()->phone}}" placeholder="Phone*">
                                    @error('phone')
                                    {{ $message }}
                                    @enderror
                                    <input type="text" name="address" value="{{Auth::guard('cus')->user()->address}}" placeholder="Address*">
                                    @error('address')
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="single-checkout-box">
                                    <input type="text" name="note" placeholder="Note*">
                                </div>
                                <div class="single-checkout-box checkbox" style="text-align: center">
                                    <button type="submit" name="submit" style="border: 1px solid #d5d5d5;display: inline-block;font-size: 20px;
                                    height: 50px;line-height: 50px;text-align: center;transition: all 0.5s ease 0s;width: 150px;color: #4b4b4b;text-transform: uppercase;">
                                        Checkout
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Checkbox Area -->
                    <!-- Start Payment Box -->
                    <!-- End Payment Box -->
                    <!-- Start Payment Way -->
                    <!-- End Payment Way -->
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="checkout-right-sidebar">
                    <div class="our-important-note">
                        <h2 class="section-title-3">Your order :</h2>
                        <p class="note-desc">List of products you need to pay for</p>
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 1; ?>
                                    @foreach ($cart->items as $key =>$item)
                                    <tr>
                                        <td class="product-name"><a href="#">{{$item['name']}}</a></td>
                                        <td class="product-price"><span class="amount">{{$item['price']}}.000VND</span></td>
                                        <td class="product-subtotal">{{$item['price']*$item['quantity']}}.000VND
                                        </td>
                                    </tr>
                                    <?php $n++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="puick-contact-area mt--60">
                        <h2 class="section-title-3">Total Order Value</h2>
                        <a href="{{route('cart.view')}}">{{$cart->total_price}}.000VND</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop()