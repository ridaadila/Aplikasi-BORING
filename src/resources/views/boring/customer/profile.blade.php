@extends('layout.layout')

@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background-color: #f3d5d5;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Profile</h2>
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                          <span class="brd-separetor">/</span>
                          <span class="breadcrumb-item active">Profile</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area --> 
<div class="single-portfolio-area bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-portfolio-img">
                    <img src="images/portfolio/single-portfolio/2.jpg" alt="">
                </div>
                {{-- <div class="categories-menu mrg-xs">
                    <div class="category-menu-list">
                        <ul>
                            <li><a href="#profile"> Profile <i class="zmdi zmdi-chevron-right"></i></a>
                            </li>
                            <li><a href="#order"> Order <i class="zmdi zmdi-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            <div class="col-md-8">
                <div class="portfolio-description mrg-sm" id="profile">
                    <h2>Profile</h2>
                    <div class="portfolio-info">
                        <ul>
                            <li><span>Name:</span></li>
                            <li><span>Email:</span>tayeb@gmail.com</li>
                            <li><span>Username:</span>tayebs</li>
                            <li><span>Password:</span>*******</li>
                            <li><span>Adress:</span>Jl. ashafhafb</li>
                            <li><span>Phone:</span>082244225879</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-related-post pb--100 bg__white" id="order">
    <div class="container">
        <div class="section__title text-center mb--50">
            <h2 class="title__line">Orders</h2>
        </div>
        <div class="tab-content portfolio-carousel-style jump">
            <div class="related-portfolio">
                <div class="row">
                    <div class="portfolio-slider-active owl-carousel">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-portfolio mb--30">
                                <div class="portfolio-img-title">
                                    <a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#">
                                        <img src="images/portfolio/equal/1.jpg" alt="" />
                                    </a>
                                    <div class="portfolio-title hover-title">
                                        {{-- <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li> --}}
                                        <h3><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#">TITLE GOES HERE</a></h3>
                                        <span>Design</span>
                                    </div>
                                </div>					
                            </div>				
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- QUICKVIEW PRODUCT -->
<div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal__container" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product">
                        <!-- Start product images -->
                        <div class="product-images">
                            <div class="main-image images">
                                <img alt="big images" src="images/product/big-img/1.jpg">
                            </div>
                        </div>
                        <!-- end product images -->
                        <div class="product-info">
                            <h1>Simple Fabric Bags</h1>
                            <div class="price-box-3">
                                <div class="s-price-box">
                                    <span class="new-price">$17.20</span>
                                    <span class="old-price">$21.20</span>
                                </div>
                            </div>
                            <div class="quick-desc">
                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
                            </div>
                            <div class="select__size">
                                <h2>Payment Status</h2>
                                <ul class="color__list">
                                    <li>Lunas</li>
                                </ul>
                            </div>
                            <div class="select__size">
                                <h2>Event Date</h2>
                                <ul class="color__list">
                                    <li>Senin, 13 Desember 2021</li>
                                </ul>
                            </div>
                        </div><!-- .product-info -->
                    </div><!-- .modal-product -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
    <!-- END Modal -->
</div>
<!-- END QUICKVIEW PRODUCT -->
@stop