@extends('layouts.site')
@Section('title','Login')
@Section('main')
  <!-- Start Login Register Area -->
  <div class="htc__login__register bg__white ptb--130" style="background: rgba(0, 0, 0, 0) url(public/siteclient/images/bg/5.jpg) no-repeat scroll center center / cover ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="{{route('home.login')}}" >Login</a></li>
                            <li role="presentation" class="register"><a href="{{route('home.register')}}" >Register</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                <form class="login" method="post" action="">
                                    @csrf
                                    <input type="email" placeholder="Email*" name="email">
                                    @error('email')
                                     {{ $message }}
                                     @enderror
                                    <input type="password" placeholder="Password*" name="password">
                                    @error('password')
                                    {{ $message }}
                                     @enderror
                                    <input type="checkbox" style=" width: 12px;height: 12px;vertical-align: middle;margin-top: 20px;" >
                                    <span> Remember me</span>
                                <div class="htc__login__btn mt--30">
                                    <button type="submit" style="border: 1px solid #d5d5d5;display: inline-block;font-size: 20px;
                                    height: 50px;line-height: 50px;text-align: center;transition: all 0.5s ease 0s;width: 150px;color: #4b4b4b;text-transform: uppercase;">Login</button>
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