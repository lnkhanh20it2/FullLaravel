@extends('layouts.site')
@Section('title','Shop')
@Section('main')
  <!-- Start Bradcaump area -->
  <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(public/siteclient/images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Shop Page</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.html">Home</a>
                                    <span class="brd-separetor">/</span>
                                    <span class="breadcrumb-item active">Shop Page</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Our Product Area -->
        <section class="htc__product__area shop__page ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <!-- Start Product MEnu -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filter__menu__container">
                                <div class="product__menu" style="font-size: 20px;">
                                    <a href="{{route('home.shop')}}" style="font-size: 20px;line-height: 21px; padding: 0 8px; font-weight: 500;">All</a>
                                    @foreach ($category as $cat)
                                    <a href="{{route('view',['id'=>$cat->id])}}" style="font-size: 20px;line-height: 21px; padding: 0 8px;font-weight: 500;"><img alt="" src="">{{$cat->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Product MEnu -->
                    <div class="row">
                        <div class="product__list another-product-style">
                            <!-- Start Single Product -->
                            @foreach ($top_product as $product)
                            <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="#">
                                                <img src="{{url('public/uploads')}}/{{$product->image}}" alt="product images" height="270px">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <li><a href="{{route('view',['id'=>$product->id])}}"><span class="ti-plus"></span></a></li>
                                                <li><a title="Add TO Cart" href="{{route('cart.add',['id'=>$product->id])}}"><span class="ti-shopping-cart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="{{route('view',['id'=>$product->id])}}"  style="display: block ;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$product->name}}</a></h2>
                                        <ul class="product__price">
                                        @if ($product->sell_price > 0)
                                        <li class="old__price">{{$product->sell_price}}.000VND</li>
                                        <li class="new__price">{{$product->price}}.000VND</li>
                                        @else
                                        <li class="new__price">{{$product->price}}.000VND</li>
                                        @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- End Single Product -->
                            
                        </div>
                    </div>
                    <!-- Start Load More BTn -->
                    <div class="row mt--60">
                        <div class="col-md-12">
                            <div class="htc__loadmore__btn">
                            {{$top_product->appends(request()->all())->links()}}
                            </div>
                        </div>
                    </div>
                    <!-- End Load More BTn -->
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
@stop()