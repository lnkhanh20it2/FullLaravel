@extends('layouts.site')
@Section('title','Home')
@Section('main')
<!-- Start Feature Product -->
<section class="categories-slider-area bg__white">
    <div class="container">
        <div class="row">
            <!-- Start Left Feature -->
            <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                <!-- Start Slider Area -->
                <div class="slider__container slider--one">
                    <div class="slider__activation__wrap owl-carousel owl-theme">
                        <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url(public/siteclient/images/banner1.png) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            < <span class="text--theme"></span>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                        <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit  slider-text-left" style="background: rgba(0, 0, 0, 0) url(public/siteclient/images/banner2.png) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                             <span class="text--theme"></span>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                    </div>
                </div>
                <!-- Start Slider Area -->
            </div>
            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                <div class="categories-menu mrg-xs">
                    <div class="category-heading">
                        <h3> Browse Categories</h3>
                    </div>
                    <div class="category-menu-list">
                        <ul>
                            @foreach ($category as $cate)
                            <li>
                                <a href="{{route('view',['id'=>$cate->id])}}"><img alt="" src="">{{$cate->name}}</i></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Left Feature -->
        </div>
    </div>
</section>
<!-- End Feature Product -->
<div class="only-banner ptb--100 bg__white">
    <div class="container">
        <div class="only-banner-img">
            <a href="#"><img src="public/siteclient/images/banner3.png" alt="new product"></a>
        </div>
    </div>
</div>
<!-- Start Our Product Area -->
<section class="htc__product__area bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="product-categories-all">
                    <div class="product-categories-title">
                        <h3>{{$first_category}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="product-style-tab">
                    <div class="product-tab-list">
                        <!-- Nav tabs -->
                        <ul class="tab-style" role="tablist">
                            <li class="active">
                                <a href="#home1" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>latest </h4>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#home2" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>on sale</h4>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content another-product-style jump">
                        <div class="tab-pane active" id="home1">
                            <div class="row">
                                <div class="product-slider-active owl-carousel">
                                    @foreach ($product_category1 as $p1)
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="product-details.html">
                                                        <img src="{{url('public/uploads')}}/{{$p1->image}}" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="{{route('view',['id'=>$p1->id])}}"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="{{route('cart.add',['id'=>$p1->id])}}"><span class="ti-shopping-cart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="{{route('view',['id'=>$p1->id])}}" style="display: block ;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$p1->name}}</a></h2>
                                                <ul class="product__price">
                                                    @if ($p1->sell_price > 0)
                                                    <li class="old__price">{{$p1->sell_price}}.000VND</li>
                                                    <li class="new__price">{{$p1->price}}.000VND</li>
                                                    @else
                                                    <li class="new__price">{{$p1->price}}.000VND</li>
                                                    @endif
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Home 2 -->
                        <div class="tab-pane" id="home2">
                            <div class="row">
                                <div class="product-slider-active owl-carousel">
                                    @foreach ($sell_product1 as $prosell)
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="product-details.html">
                                                        <img src="{{url('public/uploads')}}/{{$prosell->image}}" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="{{route('view',['id'=>$prosell->id])}}"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="{{route('cart.add',['id'=>$prosell->id])}}"><span class="ti-shopping-cart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="" style="display: block ;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$prosell->name}}</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">{{$prosell->sell_price}}.000VND</li>
                                                    <li class="new__price">{{$prosell->price}}.000VND</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
</section>
<!-- End Our Product Area -->
<div class="only-banner ptb--100 bg__white">
    <div class="container">
        <div class="only-banner-img">
            <a href="shop-sidebar.html"><img src="public/siteclient/images/banner4.png" alt="new product"></a>
        </div>
    </div>
</div>
<!-- End Our Product Area -->
<!-- Start Our Product Area -->
<section class="htc__product__area bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="product-categories-all">
                    <div class="product-categories-title">
                        <h3>{{$second_category}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="product-style-tab">
                    <div class="product-tab-list">
                        <!-- Nav tabs -->
                        <ul class="tab-style" role="tablist">
                            <li class="active">
                                <a href="#home3" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>latest </h4>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#home4" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>on sale</h4>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content another-product-style jump">
                        <div class="tab-pane active" id="home3">
                            <div class="row">
                                <div class="product-slider-active owl-carousel">
                                    @foreach ($product_category2 as $p2)
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="product-details.html">
                                                        <img src="{{url('public/uploads')}}/{{$p2->image}}" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="{{route('view',['id'=>$p2->id])}}"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="{{route('cart.add',['id'=>$p2->id])}}"><span class="ti-shopping-cart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="{{route('view',['id'=>$p2->id])}}" style="display: block ;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$p2->name}}</a></h2>
                                                <ul class="product__price">
                                                    @if ($p2->sell_price > 0)
                                                    <li class="old__price">{{$p2->sell_price}}.000VND</li>
                                                    <li class="new__price">{{$p2->price}}.000VND</li>
                                                    @else
                                                    <li class="new__price">{{$p2->price}}.000VND</li>
                                                    @endif
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Home 2 -->
                        <div class="tab-pane" id="home4">
                            <div class="row">
                                <div class="product-slider-active owl-carousel">
                                    @foreach ($sell_product2 as $prosell)
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="product-details.html">
                                                        <img src="{{url('public/uploads')}}/{{$prosell->image}}" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                    <li><a href="{{route('view',['id'=>$prosell->id])}}"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="{{route('cart.add',['id'=>$prosell->id])}}"><span class="ti-shopping-cart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="" style="display: block ;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$prosell->name}}</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">{{$prosell->sell_price}}.000VND</li>
                                                    <li class="new__price">{{$prosell->price}}.000VND</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
</section>

<!-- End Our Product Area -->

<!-- End Our Product Area -->
<div class="only-banner ptb--100 bg__white">
    <div class="container">
        <div class="only-banner-img">
            <a href="shop-sidebar.html"><img src="public/siteclient/images/banner11.png" alt="new product"></a>
        </div>
    </div>
</div>
<!-- End Our Product Area -->
<!-- Start Our Product Area -->
<section class="htc__product__area bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="product-categories-all">
                    <div class="product-categories-title">
                        <h3>{{$third_category}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="product-style-tab">
                    <div class="product-tab-list">
                        <!-- Nav tabs -->
                        <ul class="tab-style" role="tablist">
                            <li class="active">
                                <a href="#home5" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>latest </h4>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#home6" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>on sale</h4>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content another-product-style jump">
                        <div class="tab-pane active" id="home5">
                            <div class="row">
                                <div class="product-slider-active owl-carousel">
                                    @foreach ($product_category3 as $p3)
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="product-details.html">
                                                        <img src="{{url('public/uploads')}}/{{$p3->image}}" alt="product images"  height="270px">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="{{route('view',['id'=>$p3->id])}}"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="{{route('cart.add',['id'=>$p3->id])}}"><span class="ti-shopping-cart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2 style="display: block ;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><a href="">{{$p3->name}}</a></h2>
                                                <ul class="product__price">
                                                    @if ($p3->sell_price > 0)
                                                    <li class="old__price">{{$p3->sell_price}}.000VND</li>
                                                    <li class="new__price">{{$p3->price}}.000VND</li>
                                                    @else
                                                    <li class="new__price">{{$p3->price}}.000VND</li>
                                                    @endif
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Home 2 -->
                        <div class="tab-pane" id="home6">
                            <div class="row">
                                <div class="product-slider-active owl-carousel">
                                    @foreach ($sell_product3 as $prosell)
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="product-details.html">
                                                        <img src="{{url('public/uploads')}}/{{$prosell->image}}" alt="product images"  height="270px">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                    <li><a href="{{route('view',['id'=>$prosell->id])}}"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="{{route('cart.add',['id'=>$prosell->id])}}"><span class="ti-shopping-cart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2 style="display: block ;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><a href="">{{$prosell->name}}</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">{{$prosell->sell_price}}.000VND</li>
                                                    <li class="new__price">{{$prosell->price}}.000VND</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
</section>
<div class="only-banner ptb--100 bg__white">
    <div class="container">
        <div class="only-banner-img">
            <a href="shop-sidebar.html"><img src="public/siteclient/images/banner9.png" alt="new product"></a>
        </div>
    </div>
</div>
<!-- End Our Product Area
@stop()