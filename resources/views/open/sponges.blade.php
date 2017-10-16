@extends('layouts.jango.layout')

@section('seo-title')
<title>Title</title>
@endsection

@section('content')


<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
    <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-sbold">Product Details 1</h3>
                <h4 class="">Page Sub Title Goes Here</h4>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="shop-product-details.html">Product Details 1</a>
                </li>
                <li>/</li>
                <li class="c-state_active">Jango Components</li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-MENU-2 -->
            <div class="c-sidebar-menu-toggler">
                <h3 class="c-title c-font-uppercase c-font-bold">Navigation</h3>
                <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1">
                    <span class="c-line"></span>
                    <span class="c-line"></span>
                    <span class="c-line"></span>
                </a>
            </div>
            <!-- BEGIN: CONTENT/SHOPS/SHOP-FILTER-SEARCH-1 -->
            <ul class="c-shop-filter-search-1 list-unstyled">
                <li>
                    <label class="control-label c-font-uppercase c-font-bold">Category</label>
                    <select class="form-control c-square c-theme">
                        <option value="0">All Categories</option>
                        <option value="1">Art</option>
                        <option value="2">Baby</option>
                        <option value="3">Books</option>
                        <option value="4">Business &amp; Industrial</option>
                        <option value="5">Cameras &amp; Photo</option>
                        <option value="6">Cell Phones &amp; Accessories</option>
                        <option value="7">Clothing, Shoes &amp; Accessories</option>
                        <option value="8">Coins &amp; Paper Money</option>
                        <option value="9">Collectibles</option>
                        <option value="10">Computers/Tablets &amp; Networking</option>
                    </select>
                </li>
                <li>
                    <label class="control-label c-font-uppercase c-font-bold">Availability</label>
                    <div class="c-checkbox">
                        <input type="checkbox" id="checkbox-sidebar-3-1" class="c-check">
                        <label for="checkbox-sidebar-3-1">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            <p>Not Available (3)</p>
                        </label>
                    </div>
                    <div class="c-checkbox c-checkbox-height">
                        <input type="checkbox" id="checkbox-sidebar-3-2" class="c-check">
                        <label for="checkbox-sidebar-3-2">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            <p>In Stock (23)</p>
                        </label>
                    </div>
                </li>
                <li>
                    <label class="control-label c-font-uppercase c-font-bold">Price Range</label>
                    <div class="c-price-range-box input-group">
                        <div class="c-price input-group col-md-6 pull-left">
                            <span class="input-group-addon c-square c-theme">$</span>
                            <input type="text" class="form-control c-square c-theme" placeholder="from"> </div>
                        <div class="c-price input-group col-md-6 pull-left">
                            <span class="input-group-addon c-square c-theme">$</span>
                            <input type="text" class="form-control c-square c-theme" placeholder="to"> </div>
                    </div>
                </li>
                <li>
                    <label class="control-label c-font-uppercase c-font-bold">Price Range Slider Color</label>
                    <p>Price Range: $1 - $ 500</p>
                    <div class="c-price-range-slider c-theme-1 input-group">
                        <input type="text" class="c-price-slider" value="" data-slider-min="1" data-slider-max="500" data-slider-step="1" data-slider-value="[100,250]"> </div>
                </li>
                <li>
                    <label class="control-label c-font-uppercase c-font-bold">Price Range Slider Color</label>
                    <p>Price Range: $1 - $ 500</p>
                    <div class="c-price-range-slider c-theme-2 input-group">
                        <input type="text" class="c-price-slider" value="" data-slider-handle="square" data-slider-min="1" data-slider-max="500" data-slider-step="1" data-slider-value="[100,250]"> </div>
                </li>
                <li>
                    <label class="control-label c-font-uppercase c-font-bold">Price Group</label>
                    <div class="input-group">
                        <div class="c-checkbox">
                            <input type="checkbox" id="checkbox-sidebar-1-1" class="c-check">
                            <label for="checkbox-sidebar-1-1">
                                <span class="inc"></span>
                                <span class="check"></span>
                                <span class="box"></span> $0 - $10 (15) </label>
                        </div>
                        <div class="c-checkbox">
                            <input type="checkbox" id="checkbox-sidebar-1-2" class="c-check">
                            <label for="checkbox-sidebar-1-2">
                                <span class="inc"></span>
                                <span class="check"></span>
                                <span class="box"></span> $11 - $20 (17) </label>
                        </div>
                        <div class="c-checkbox">
                            <input type="checkbox" id="checkbox-sidebar-1-3" class="c-check">
                            <label for="checkbox-sidebar-1-3">
                                <span class="inc"></span>
                                <span class="check"></span>
                                <span class="box"></span> $21 - $30 (23) </label>
                        </div>
                        <div class="c-checkbox c-checkbox-height">
                            <input type="checkbox" id="checkbox-sidebar-1-4" class="c-check">
                            <label for="checkbox-sidebar-1-4">
                                <span class="inc"></span>
                                <span class="check"></span>
                                <span class="box"></span> $31 - $40 (19) </label>
                        </div>
                    </div>
                </li>
                <li class="c-margin-b-40">
                    <label class="control-label c-font-uppercase c-font-bold">Review Rating</label>
                    <div class="c-checkbox">
                        <input type="checkbox" id="checkbox-sidebar-2-1" class="c-check">
                        <label for="checkbox-sidebar-2-1">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            <p class="c-review-star">
                                <span class="fa fa-star c-theme-font"></span>
                                <span class="fa fa-star c-theme-font"></span>
                                <span class="fa fa-star c-theme-font"></span>
                                <span class="fa fa-star c-theme-font"></span>
                                <span class="fa fa-star c-theme-font"></span> (18) </p>
                        </label>
                    </div>
                    <div class="c-checkbox">
                        <input type="checkbox" id="checkbox-sidebar-2-2" class="c-check">
                        <label for="checkbox-sidebar-2-2">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            <p class="c-review-star">
                                <span class="fa fa-star c-theme-font"></span>
                                <span class="fa fa-star c-theme-font"></span>
                                <span class="fa fa-star c-theme-font"></span>
                                <span class="fa fa-star c-theme-font"></span> (20) </p>
                        </label>
                    </div>
                    <div class="c-checkbox">
                        <input type="checkbox" id="checkbox-sidebar-2-3" class="c-check">
                        <label for="checkbox-sidebar-2-3">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            <p class="c-review-star">
                                <span class="fa fa-star c-theme-font"></span>
                                <span class="fa fa-star c-theme-font"></span>
                                <span class="fa fa-star c-theme-font"></span> (9) </p>
                        </label>
                    </div>
                    <div class="c-checkbox">
                        <input type="checkbox" id="checkbox-sidebar-2-4" class="c-check">
                        <label for="checkbox-sidebar-2-4">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            <p class="c-review-star">
                                <span class="fa fa-star c-theme-font"></span>
                                <span class="fa fa-star c-theme-font"></span> (4) </p>
                        </label>
                    </div>
                    <div class="c-checkbox">
                        <input type="checkbox" id="checkbox-sidebar-2-5" class="c-check">
                        <label for="checkbox-sidebar-2-5">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            <p class="c-review-star">
                                <span class="fa fa-star c-theme-font"></span> (1) </p>
                        </label>
                    </div>
                    <div class="c-checkbox">
                        <input type="checkbox" id="checkbox-sidebar-2-6" class="c-check">
                        <label for="checkbox-sidebar-2-6">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            <p class="c-review-star">No yet rated (10)</p>
                        </label>
                    </div>
                </li>
            </ul>
            <!-- END: CONTENT/SHOPS/SHOP-FILTER-SEARCH-1 -->
            <ul class="c-sidebar-menu collapse " id="sidebar-menu-1">
                <li class="c-dropdown c-active c-open">
                    <a href="javascript:;" class="c-toggler">Active Section
                        <span class="c-arrow"></span>
                    </a>
                    <ul class="c-dropdown-menu">
                        <li class="c-active">
                            <a href="#">Active Link</a>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                    </ul>
                </li>
                <li class="c-dropdown">
                    <a href="javascript:;" class="c-toggler">Sub Menu Section
                        <span class="c-arrow"></span>
                    </a>
                    <ul class="c-dropdown-menu">
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li class="c-dropdown">
                            <a href="javascript:;" class="c-toggler">Sub Menu
                                <span class="c-arrow"></span>
                            </a>
                            <ul class="c-dropdown-menu">
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li class="c-dropdown">
                            <a href="javascript:;" class="c-toggler">Sub Menu
                                <span class="c-arrow"></span>
                            </a>
                            <ul class="c-dropdown-menu">
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li class="c-dropdown">
                                    <a href="javascript:;" class="c-toggler">Sub Menu
                                        <span class="c-arrow"></span>
                                    </a>
                                    <ul class="c-dropdown-menu">
                                        <li>
                                            <a href="#">Example Link</a>
                                        </li>
                                        <li>
                                            <a href="#">Example Link</a>
                                        </li>
                                        <li>
                                            <a href="#">Example Link</a>
                                        </li>
                                        <li>
                                            <a href="#">Example Link</a>
                                        </li>
                                        <li>
                                            <a href="#">Example Link</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                    </ul>
                </li>
                <li class="c-dropdown">
                    <a href="javascript:;" class="c-toggler">Section With Icons
                        <span class="c-arrow"></span>
                    </a>
                    <ul class="c-dropdown-menu">
                        <li>
                            <a href="#">
                                <i class="icon-social-dribbble"></i> Example Link</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-bell"></i> Example Link</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-bubbles"></i> Example Link</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-user"></i> Example Link</a>
                        </li>
                    </ul>
                </li>
                <li class="c-dropdown">
                    <a href="javascript:;" class="c-toggler">Expanded Section
                        <span class="c-arrow"></span>
                    </a>
                    <ul class="c-dropdown-menu">
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                    </ul>
                </li>
                <li class="c-dropdown">
                    <a href="javascript:;">Arrow Toggler
                        <span class="c-arrow c-toggler"></span>
                    </a>
                    <ul class="c-dropdown-menu">
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li>
                            <a href="#">Example Link</a>
                        </li>
                        <li class="c-dropdown">
                            <a href="javascript:;">Sub Menu
                                <span class="c-arrow c-toggler"></span>
                            </a>
                            <ul class="c-dropdown-menu">
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                                <li>
                                    <a href="#">Example Link</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END: LAYOUT/SIDEBARS/SHOP-SIDEBAR-MENU-2 -->
        </div>
        <div class="c-layout-sidebar-content ">
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: CONTENT/SHOPS/SHOP-PRODUCT-DETAILS-1 -->
            <div class="c-shop-product-details-2 c-opt-1">
                <div class="row">
                    <div class="col-md-6">
                        <div class="c-product-gallery">
                            <div class="c-product-gallery-content">
                                <div class="c-zoom">
                                    <img src="/jango/assets/base/img/content/shop8/34.jpg"> </div>
                                <div class="c-zoom">
                                    <img src="/jango/assets/base/img/content/shop8/35.jpg"> </div>
                                <div class="c-zoom">
                                    <img src="/jango/assets/base/img/content/shop8/37.jpg"> </div>
                                <div class="c-zoom">
                                    <img src="/jango/assets/base/img/content/shop8/29.jpg"> </div>
                            </div>
                            <div class="row c-product-gallery-thumbnail">
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="/jango/assets/base/img/content/shop/91.jpg"> </div>
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="/jango/assets/base/img/content/shop/92.jpg"> </div>
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="/jango/assets/base/img/content/shop/02.jpg"> </div>
                                <div class="col-xs-3 c-product-thumb c-product-thumb-last">
                                    <img src="/jango/assets/base/img/content/shop/80.jpg"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="c-product-meta">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">Warm Winter Jacket</h3>
                                <div class="c-line-left"></div>
                            </div>
                            <div class="c-product-badge">
                                <div class="c-product-sale">Sale</div>
                                <div class="c-product-new">New</div>
                            </div>
                            <div class="c-product-review">
                                <div class="c-product-rating">
                                    <i class="fa fa-star c-font-red"></i>
                                    <i class="fa fa-star c-font-red"></i>
                                    <i class="fa fa-star c-font-red"></i>
                                    <i class="fa fa-star c-font-red"></i>
                                    <i class="fa fa-star-half-o c-font-red"></i>
                                </div>
                                <div class="c-product-write-review">
                                    <a class="c-font-red" href="#">Write a review</a>
                                </div>
                            </div>
                            <div class="c-product-price">$99.00</div>
                            <div class="c-product-short-desc"> Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore. </div>
                            <div class="row c-product-variant">
                                <div class="col-sm-12 col-xs-12">
                                    <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Size:</p>
                                    <div class="c-product-size">
                                        <select>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12 c-margin-t-20">
                                    <div class="c-product-color">
                                        <p class="c-product-meta-label c-font-uppercase c-font-bold">Color:</p>
                                        <select>
                                            <option value="Red">Red</option>
                                            <option value="Black">Black</option>
                                            <option value="Beige">Beige</option>
                                            <option value="White">White</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="c-product-add-cart c-margin-t-20">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="c-input-group c-spinner">
                                            <p class="c-product-meta-label c-product-margin-2 c-font-uppercase c-font-bold">QTY:</p>
                                            <input type="text" class="form-control c-item-1" value="1">
                                            <div class="c-input-group-btn-vertical">
                                                <button class="btn btn-default" type="button" data_input="c-item-1">
                                                    <i class="fa fa-caret-up"></i>
                                                </button>
                                                <button class="btn btn-default" type="button" data_input="c-item-1">
                                                    <i class="fa fa-caret-down"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12 c-margin-t-20">
                                        <button class="btn c-btn btn-lg c-font-bold c-font-white c-theme-btn c-btn-square c-font-uppercase">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/SHOPS/SHOP-PRODUCT-DETAILS-1 -->
            <!-- BEGIN: CONTENT/SHOPS/SHOP-PRODUCT-TAB-2 -->
            <div class="c-content-box c-size-md c-no-padding c-margin-t-60">
                <div class="c-shop-product-tab-1" role="tabpanel">
                    <div class="c-product-tab-container">
                        <ul class="nav nav-justified" role="tablist">
                            <li role="presentation" class="active">
                                <a class="c-font-uppercase c-font-bold" href="#tab-1" role="tab" data-toggle="tab">Description</a>
                            </li>
                            <li role="presentation">
                                <a class="c-font-uppercase c-font-bold" href="#tab-2" role="tab" data-toggle="tab">Additional Information</a>
                            </li>
                            <li role="presentation">
                                <a class="c-font-uppercase c-font-bold" href="#tab-3" role="tab" data-toggle="tab">Reviews (3)</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tab-1">
                            <div class="c-product-desc c-center c-opt-2">
                                <div class="c-product-tab-container">
                                    <img src="/jango/assets/base/img/content/shop5/30.png" />
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                        suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                        suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                </div>
                            </div>
                            <div class="c-product-desc c-bg-dark c-opt-2">
                                <div class="c-product-tab-container">
                                    <div class "row">
                                         <div class="col-md-6">
                                            <img src="/jango/assets/base/img/content/shop5/32.png" /> </div>
                                        <div class="col-md-6">
                                            <div class="c-content-title-1">
                                                <h3 class="c-font-uppercase c-font-white c-font-bold">Incredibly Versatile</h3>
                                                <div class="c-line-left"></div>
                                            </div>
                                            <p class="c-font-grey"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                            <br>
                                            <button class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-product-desc c-bg-grey c-opt-2">
                                <div class="c-product-tab-container">
                                    <div class "row">
                                         <div class="col-md-6">
                                            <div class="c-content-title-1">
                                                <h3 class="c-font-uppercase c-font-bold c-right">High Quality</h3>
                                                <div class="c-line-right"></div>
                                            </div>
                                            <p class="c-right"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                                ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                            <br>
                                            <button class="btn c-float-r c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square">Add to Cart</button>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="/jango/assets/base/img/content/shop5/31.png" /> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab-2">
                            <div class="c-product-tab-container">
                                <p class="c-center">
                                    <strong>Sizes:</strong> S, M, L, XL</p>
                                <br>
                                <p class="c-center">
                                    <strong>Colors:</strong> Red, Black, Beige, White</p>
                                <br/> </div>
                            <div class="c-product-tab-meta-bg c-bg-grey c-center">
                                <div class="c-product-tab-container">
                                    <p class="c-product-tab-meta">
                                        <strong>SKU:</strong> 1410SL</p>
                                    <p class="c-product-tab-meta">
                                        <strong>Categories:</strong>
                                        <a href="#">Jacket</a>,
                                        <a href="#">Winter</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab-3">
                            <div class="c-product-tab-container">
                                <h3 class="c-font-uppercase c-font-bold c-font-22 c-center c-margin-b-40 c-margin-t-40">Reviews for Warm Winter Jacket</h3>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="c-user-avatar">
                                            <img src="/jango/assets/base/img/content/avatars/team1.jpg" /> </div>
                                        <div class="c-product-review-name">
                                            <h3 class="c-font-bold c-font-24 c-margin-b-5">Steve</h3>
                                            <p class="c-date c-theme-font c-font-14">July 4, 2015</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="c-product-rating c-right">
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star-half-o c-font-red"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="c-product-review-content">
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud </p>
                                </div>
                                <div class="row c-margin-t-40">
                                    <div class="col-xs-6">
                                        <div class="c-user-avatar">
                                            <img src="/jango/assets/base/img/content/avatars/team12.jpg" /> </div>
                                        <div class="c-product-review-name">
                                            <h3 class="c-font-bold c-font-24 c-margin-b-5">John</h3>
                                            <p class="c-date c-theme-font c-font-14">July 4, 2015</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="c-product-rating c-right">
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star-half-o c-font-red"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="c-product-review-content">
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud </p>
                                </div>
                                <div class="row c-margin-t-40">
                                    <div class="col-xs-6">
                                        <div class="c-user-avatar">
                                            <img src="/jango/assets/base/img/content/avatars/team8.jpg" /> </div>
                                        <div class="c-product-review-name">
                                            <h3 class="c-font-bold c-font-24 c-margin-b-5">Alice</h3>
                                            <p class="c-date c-theme-font c-font-14">July 4, 2015</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="c-product-rating c-right">
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star c-font-red"></i>
                                            <i class="fa fa-star-half-o c-font-red"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="c-product-review-content">
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud </p>
                                </div>
                                <div class="c-product-review-input">
                                    <h3 class="c-font-bold c-font-uppercase">Submit your Review</h3>
                                    <p class="c-review-rating-input">Rating:
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </p>
                                    <textarea></textarea>
                                    <button class="btn c-btn c-btn-square c-theme-btn c-font-bold c-font-uppercase c-font-white">Submit Review</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/SHOPS/SHOP-PRODUCT-TAB-2 -->
            <!-- END: PAGE CONTENT -->
        </div>
    </div>
</div>
<!-- END: PAGE CONTAINER -->

@endsection

@section('custom-js')
<!-- BEGIN: PAGE SCRIPTS -->
<script src="/jango/assets/plugins/zoom-master/jquery.zoom.min.js" type="text/javascript"></script>
<!-- END: PAGE SCRIPTS -->
@endsection

