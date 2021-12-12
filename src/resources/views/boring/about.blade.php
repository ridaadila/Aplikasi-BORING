@extends('layout.layout')

@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background-color: #f3d5d5;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">About Us</h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="index.html">Home</a>
                          <span class="brd-separetor">/</span>
                          <span class="breadcrumb-item active">About Us</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area --> 
<!-- Start Our Store Area -->
<section class="htc__store__area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section__title section__title--2 text-center">
                    <h2 class="title__line">Welcome To BORING</h2>
                    <p>Fulfill your wedding needs with us.</p>
                </div>
                <div class="store__btn">
                    <a href="{{ route('contact') }}">contact us</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Store Area -->
<!-- Start Our Team Area -->
<section class="htc__team__area bg__white ptb--120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section__title section__title--2 text-center">
                    <h2 class="title__line">Our Staff</h2>
                    <p>Meet the developers.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="team__wrap clearfix mt--60">
                <!-- Start Single Team -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="team foo">
                        <div class="team__thumb">
                            <a href="#">
                                <img src="images/team/1.png" alt="team images">
                            </a>
                        </div>
                        <div class="team__bg__color"></div>
                        <div class="team__hover__info">
                            <div class="team__hover__action">
                                <h2><a href="#">Kana Rekha</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                <!-- Start Single Team -->
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 xmt-30">
                    <div class="team foo">
                        <div class="team__thumb">
                            <a href="#">
                                <img src="images/team/2.png" alt="team images">
                            </a>
                        </div>
                        <div class="team__bg__color"></div>
                        <div class="team__hover__info">
                            <div class="team__hover__action">
                                <h2><a href="#">Rida Adila</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                <!-- Start Single Team -->
                <div class="col-md-3 col-lg-3 hidden-sm col-xs-12 xmt-30">
                    <div class="team foo">
                        <div class="team__thumb">
                            <a href="#">
                                <img src="images/team/3.png" alt="team images">
                            </a>
                        </div>
                        <div class="team__bg__color"></div>
                        <div class="team__hover__info">
                            <div class="team__hover__action">
                                <h2><a href="#">Btari Aliya Tsabitah</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
                <!-- Start Single Team -->
                <div class="col-md-3 col-lg-3 hidden-sm col-xs-12 xmt-30">
                    <div class="team foo">
                        <div class="team__thumb">
                            <a href="#">
                                <img src="images/team/4.png" alt="team images">
                            </a>
                        </div>
                        <div class="team__bg__color"></div>
                        <div class="team__hover__info">
                            <div class="team__hover__action">
                                <h2><a href="#">Zahratul Millah</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Team -->
            </div>
        </div>
    </div>
</section>
<!-- End Our Team Area -->
<!-- Start brand Area -->
<div class="htc__brand__area bg__white ptb--120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="brand__list">
                    <li><a href="#">
                        <img src="images/brand/1.png" alt="brand images">
                    </a></li>
                    <li><a href="#">
                        <img src="images/brand/2.png" alt="brand images">
                    </a></li>
                    <li><a href="#">
                        <img src="images/brand/3.png" alt="brand images">
                    </a></li>
                    <li><a href="#">
                        <img src="images/brand/4.png" alt="brand images">
                    </a></li>
                    <li class="hidden-sm"><a href="#">
                        <img src="images/brand/5.png" alt="brand images">
                    </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End brand Area -->
@stop