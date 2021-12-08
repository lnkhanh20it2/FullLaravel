@extends('layouts.site')
@Section('title','404')
@Section('main')
<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url( public/siteclient/images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Order success !</h2>
                                <p>You can check your email <b>{{$email}}</b> ...</p>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="{{route('home.index')}}">Continue Shopping</a>
                                    <span class="brd-separetor">/</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
    
@stop()