@extends('layouts.site')
@Section('title','Login')
@Section('main')
  <!-- Start Login Register Area -->
  <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(public/siteclient/images/bg/5.jpg) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login"><a href="{{route('home.login')}}">Login</a></li>
                            <li role="presentation" class="register active"><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->
                            <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                <form class="login" method="post" action="">
                                @if (session('status'))
                                <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> </button>
                                {{ session('status') }}
                                </div>
                                @endif
                                @csrf
                                    <input type="text" placeholder="Name*" name="name">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                    <input type="email" placeholder="Email*" name="email">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                    <input type="text" placeholder="Phone*" name="phone">
                                    @error('phone')
                                    {{ $message }}
                                    @enderror
                                    <input type="password" placeholder="Password*" name="password">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                    <input type="text" placeholder="Address*" name="address">
                                    @error('address')
                                    {{ $message }}
                                    @enderror
                                <div class="htc__login__btn">
                                <button type="submit" style="border: 1px solid #d5d5d5;display: inline-block;font-size: 20px;
                                    height: 50px;line-height: 50px;text-align: center;transition: all 0.5s ease 0s;width: 150px;color: #4b4b4b;text-transform: uppercase;">Register</button>
                                </div>
                                </form>
                                <div class="htc__social__connect">
                                    <h2>Or Login With</h2>
                                    <ul class="htc__soaial__list">
                                        <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                        <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                        <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>
        <!-- End Login Register Area -->
@stop()