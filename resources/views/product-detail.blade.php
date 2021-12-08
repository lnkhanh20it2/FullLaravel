@extends('layouts.site')
@Section('title','Product')
@Section('main')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('add-rating')}}" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$model->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{$model->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if($user_rating)
                            @for ($i=1; $i <=$user_rating->stars_rated; $i++)
                                <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                <label for="rating{{$i}}" class="fa fa-star"></label>
                            @endfor
                            @for ($j = $user_rating->stars_rated+1; $j<=5; $j++)
                            <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                            <label for="rating{{$j}}" class="fa fa-star"></label>
                            @endfor
                            @else
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Rate</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../public/siteclient/images/bg/2.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Product Details</h2>
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb-item active">Product Details</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Details -->
<?php
$images = json_decode($model->image_list);
?>
<section class="htc__product__details pt--120 pb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <img src="{{url('public/uploads')}}/{{$model->image}}" alt="" style="width: 100%;">
                @if(is_array($images))
                <hr>
                <div class="row">
                    @foreach($images as $img)
                    <div class="col-md-4">
                        <img src="{{$img}}" alt="" style="width: 100%; margin-top: 10px;">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                <div class="htc__product__details__inner">
                    <div class="pro__detl__title">
                        <h2>{{$model->name}}</h2>
                    </div>
                    <?php $ratenum = number_format($rating_value) ?>
                    <div class="rating">
                        @for ($i=1;$i<=$ratenum;$i++) 
                            <i class="fa fa-star checked"></i>
                            @endfor
                            @for($j =$ratenum +1; $j<=5;$j++)
                             <i class="fa fa-star"></i>
                                @endfor
                                <span>
                                    @if($rating->count() > 0)
                                    {{$rating->count()}} Ratings
                                    @else
                                    No Ratings
                                    @endif

                                </span>
                    </div>
                    <div class="pro__details" style="white-space: nowrap; 
  overflow: hidden;
  text-overflow: ellipsis; ">
                        <p>{!!$model->description!!}</p>
                    </div>
                    <ul class="pro__dtl__prize">
                        @if ($model->sell_price > 0)
                        <li class="old__prize">{{$model->dell_price}}</li>
                        <li>{{$model->price}}.000VND</li>
                        @else
                        <li>{{$model->price}}.000VND</li>
                        @endif
                    </ul>
                    <div class="product-action-wrap">
                        <div class="prodict-statas"><span>Quantity :</span></div>
                        <div class="product-quantity">
                            <form id='myform' method='get' action="{{route('cart.add_quantity',['id'=>$model->id])}}">
                                <div class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="quantity" value="1">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <ul class="pro__dtl__btn">
                        <li class="buy__now__btn"><button style="color: #4b4b4b;
    font-size: 14px;
    text-transform: uppercase;
    width: 175px;
    transition: 0.3s;
    border: 1px solid #d5d5d5;
    display: block;
    height: 44px;
    line-height: 44px;
    text-align: center;">buy now</button></li>
                    </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Details -->
<!-- Start Product tab -->
<section class="htc__product__details__tab bg__white pb--120">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <ul class="product__deatils__tab mb--60" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#description" role="tab" data-toggle="tab">Description</a>
                    </li>
                    <li role="presentation">
                        <a href="#reviews" role="tab" data-toggle="tab">Reviews</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product__details__tab__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="product__tab__content fade in active">
                        <div class="product__description__wrap">
                            <div class="product__desc">
                                <h2 class="title__6">Details</h2>
                                <p>{!!$model->description!!}</p>
                            </div>
                            <button type="button" data-toggle="modal" data-target="#exampleModal"  style="color: #4b4b4b;
    font-size: 14px;
    text-transform: uppercase;
    width: 175px;
    transition: 0.3s;
    border: 1px solid #d5d5d5;
    display: block;
    height: 44px;
    line-height: 44px;
    text-align: center;" >
                                Rate this product
                            </button>
                            
                            @if(session('status'))
                                <section class='alert alert-success'>{{session('status')}}</section>
                            @endif  

                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="reviews" class="product__tab__content fade">
                        @foreach($reviews as $review)
                        <div class="review__address__inner">
                            <!-- Start Single Review -->
                            <?php
                                $rating = App\Models\Rating::where('product_id',$model->id)->where('account_id',$review->user->id)->first();
                            ?>
                            <div class="pro__review">
                                <div class="review__thumb">
                                </div>
                                <div class="review__details">
                                    <div class="review__info">
                                        <h4>{{$review->user->name}}</h4>
                                        <ul class="rating">
                                        @if($rating)
                                            <?php $user_rated = $rating->stars_rated ?>
                                            @for ($i=1;$i<=$user_rated;$i++) 
                                                <i class="fa fa-star checked"></i>
                                            @endfor
                                            @for($j =$user_rated +1; $j<=5;$j++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        @endif
                                        </ul>
                                        @if ($review->account_id == optional(Auth::guard('cus')->user())->id)
                                        <div class="rating__send">
                                            <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="review__date">
                                        <span>Reviewed on {{$review->created_at->format('d M Y')}}</span>
                                    </div>
                                    <p>{{$review->review}}</p>
                                </div>
                            </div>
                            <!-- End Single Review -->
                            <!-- Start Single Review -->
                            <div class="pro__review ans">
                            </div>
                            <!-- End Single Review -->
                        </div>
                        @endforeach
                        <!-- Start RAting Area -->
                        <div class="rating__wrap">
                            <h2 class="rating-title">Write A review for {{$model->name}}</h2>
                            <h4 class="rating-title-2">Your Rating</h4>
                        </div>
                        <!-- End RAting Area -->
                        <div class="review__box">
                            <form id="review-form" method="post" action="{{route('add-review')}}">
                                @csrf
                                <div class="single-review-form">
                                    <div class="review-box message">
                                        <input type="hidden" name ="product_id" value="{{$model->id}}">
                                        <textarea placeholder="Write your review" name="review" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="review-btn">
                                    <button type="submit" class="fv-btn" style="color: #4b4b4b;
    font-size: 14px;
    text-transform: uppercase;
    width: 175px;
    transition: 0.3s;
    border: 1px solid #d5d5d5;
    display: block;
    height: 44px;
    line-height: 44px;
    text-align: center;">submit review</button>
                                </div>
                                @if(session('status_review'))
                                <section class='alert alert-success'>{{session('status_review')}}</section>
                                @endif  
                            </form>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product tab -->
@stop()
@section('js')
<script>

</script>
@stop()