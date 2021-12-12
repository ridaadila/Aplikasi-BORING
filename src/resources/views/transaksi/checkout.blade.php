@extends('layout.layout')

@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background-color: #f3d5d5;">
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
<!-- Start Checkout Area -->
<section class="our-checkout-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="ckeckout-left-sidebar">
                    <!-- Start Payment Box -->
                    <div class="checkout-form">
                        <h2 class="section-title-3">payment details</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur kgjhyt</p>
                        <div class="payment-form-inner">
                            <div class="single-checkout-box">
                                <input type="text" placeholder="Name on Card*">
                                <input type="text" placeholder="Card Number*">
                            </div>
                            <div class="single-checkout-box select-option">
                                <select>
                                    <option>Date*</option>
                                    <option>Date</option>
                                    <option>Date</option>
                                    <option>Date</option>
                                    <option>Date</option>
                                </select>
                                <input type="text" placeholder="Security Code*">
                            </div>
                        </div>
                    </div>
                    <!-- End Payment Box -->
                    <!-- Start Payment Way -->
                    <div class="our-payment-sestem">
                        <h2 class="section-title-3">We  Accept :</h2>
                        <ul class="payment-menu">
                            <li><a href="#"><img src="images/payment/1.jpg" alt="payment-img"></a></li>
                            <li><a href="#"><img src="images/payment/2.jpg" alt="payment-img"></a></li>
                            <li><a href="#"><img src="images/payment/3.jpg" alt="payment-img"></a></li>
                            <li><a href="#"><img src="images/payment/4.jpg" alt="payment-img"></a></li>
                            <li><a href="#"><img src="images/payment/5.jpg" alt="payment-img"></a></li>
                        </ul>
                        <div class="wc-proceed-to-checkout">
                            <a href="#">CONFIRM & BUY NOW</a>
                        </div>
                        {{-- <div class="checkout-btn">
                            <a class="ts-btn btn-light btn-large hover-theme" href="#">CONFIRM & BUY NOW</a>
                        </div>     --}}
                    </div>
                    <!-- End Payment Way -->
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="checkout-right-sidebar">
                    <div class="our-important-note">
                        <h2 class="section-title-3">Note :</h2>
                        <p class="note-desc">Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut laborekf et dolore magna aliqua.</p>
                        <ul class="important-note">
                            <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                            <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet</a></li>
                            <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                            <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet, consectetur nipabali</a></li>
                            <li><a href="#"><i class="zmdi zmdi-caret-right-circle"></i>Lorem ipsum dolor sit amet</a></li>
                        </ul>
                    </div>
                    <div class="puick-contact-area mt--60">
                        <h2 class="section-title-3">Quick Contract</h2>
                        <a href="phone:+8801722889963">+012 345 678 102 </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Checkout Area -->
@stop