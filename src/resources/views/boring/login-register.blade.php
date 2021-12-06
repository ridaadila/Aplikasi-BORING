@extends('layout.layout')

@section('content')
<!-- Start Login Register Area -->
<div class="htc__login__register bg__white ptb--130" style="background-color: #f3d5d5;">
    <div class="row">
    <div class="card">
    <div class="card-body col-md-4 col-md-offset-4" style="background-color: rgba(255,255,255, 0.3); padding: 25px 0px;">
        <!-- This is some text within a card body. -->

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="login__register__menu" role="tablist">
                    <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                    <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Register</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <form class="login" method="post" action="">
                            <input type="text" placeholder="Username*" id="username" name="username" value="">
                            <input type="password" placeholder="Password*" id="password" name="password">

                            <div class="htc__login__btn mt--30">
                                <a href="{{ route('home') }}">Login</a>
                                <!-- <a>
                                <input type="submit" value="Login" style="border-style: none;"/>
                                </a> -->
                            </div>

                        </form>
                    </div>
                    <!-- End Single Content -->

                    <!-- Start Single Content -->
                    <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                        <form class="login" method="post" action="">
                            <input type="text" placeholder="Nama*" id="nama" name="nama" value="">
                            <input type="text" placeholder="Username*" id="username" name="username" value="">
                            <input type="email" placeholder="Email*" id="email" name="email" value="">
                            <input type="text" placeholder="No Hp*" id="no_hp" name="no_hp" value="">
                            <input type="text" placeholder="Alamat*" id="alamat" name="alamat" value="">
                            <input type="password" placeholder="Password*" id="password" name="password">

                            <div class="htc__login__btn">
                                <a href="{{ route('home') }} ">Register</a>
                                <!-- <a>
                                <input type="submit" value="Register" style="border-style: none"/>
                                </a> -->
                            </div>
                        </form>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
    </div>
    </div>
</div>
<!-- End Login Register Area -->
@stop
