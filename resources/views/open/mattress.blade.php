@extends('layouts.jango.layout')

@section('seo-title')
<title>Title</title>
@endsection

@section('content')


<!-- BEGIN: PAGE CONTAINER -->
<br>
<div class="c-layout-page">
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
    <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
        <div class="container" >
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-sbold" >Product Details 1</h3>
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
                    <label class="control-label c-font-uppercase c-font-bold">Duseci</label>
                    <select class="form-control c-square c-theme">
                        <option value="0">Svi duseci</option>
                        @if(count($mattresses)>0)
                        @foreach($mattresses as $mattress)
                        <option value="{{$mattress->id}}">{{$mattress->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </li>


                <li>
                    <label class="control-label c-font-uppercase c-font-bold">Price Range Slider Color</label>
                    <p>Price Range: $1 - $ 500</p>
                    <div class="c-price-range-slider c-theme-1 input-group">
                        <input type="text" class="c-price-slider" value="" data-slider-min="1" data-slider-max="500" data-slider-step="1" data-slider-value="[100,250]"> </div>
                </li>



            </ul>

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
                                    <img src="{{$product->image}}"> </div>
                                <div class="c-zoom">
                                    <img src="{{$product->image}}"> </div>
                                <div class="c-zoom">
                                    <img src="{{$product->image}}"> </div>
                                <div class="c-zoom">
                                    <img src="{{$product->image}}"> </div>
                            </div>
                            <div class="row c-product-gallery-thumbnail">
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="{{$product->image}}"> </div>
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="{{$product->image}}"> </div>
                                <div class="col-xs-3 c-product-thumb">
                                    <img src="{{$product->image}}"> </div>
                                <div class="col-xs-3 c-product-thumb c-product-thumb-last">
                                    <img src="{{$product->image}}"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="c-product-meta">
                            <div class="c-content-title-1">
                                <h3 class="c-font-uppercase c-font-bold">{{$product->name}}</h3>
                                <div class="c-line-left"></div>
                            </div>
                            @if(!empty($product->sticker_id))
                            <div class="c-product-badge">
                                @if($product->sticker_id == 1)
                                <div class="c-product-sale">Sale</div>
                                @else
                                <div class="c-product-new">New</div>
                                @endif

                            </div>
                            @endif
                            <div class="c-product-review">

                            </div>
                            <div class="c-product-price">
                                @if(count($prices)>0)
                                @foreach($prices as $price)
                                @if($price->product_id == $product->id && $price->product_id ==)
                                {{$price->price}} Din.
                                @endif
                                @endforeach
                                @endif


                            </div>
                            <div class="c-product-short-desc"> {{$product->description}} </div>
                            <div class="row c-product-variant">
                                <div class="col-sm-12 col-xs-12">
                                    <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Dimenzije:</p>
                                    <div class="c-product-size">

                                        <select name="dimension" id="dimension" >
                                            <option value="0">--Izaberi dimenziju--</option> 
                                            @if(count($dimensions)>0)
                                            @foreach($dimensions as $dimension)
                                            <?php if (in_array($dimension->id, $dimensionsFilter)) { ?>
                                                <option value="{{$dimension->id}}">{{$dimension->height}}X{{$dimension->width}}</option>  
                                            <?php } ?>
                                            @endforeach
                                            @endif
                                        </select>

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
                                <a class="c-font-uppercase c-font-bold" href="#tab-1" role="tab" data-toggle="tab">Opis</a>
                            </li>
                            <li role="presentation">
                                <a class="c-font-uppercase c-font-bold" href="#tab-2" role="tab" data-toggle="tab">Dimenzije</a>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tab-1">
                            <div class="c-product-desc c-center c-opt-2">
                                <div class="c-product-tab-container">

                                    <p> {{$product->description}}</p>

                                </div>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab-2">
                            <div class="c-product-tab-container">
                                <p class="c-center">
                                    <strong>Dimenzije:</strong> <br/>
                                    @if(count($dimensions)>0)
                                    @foreach($dimensions as $dimension) 
                                    {{$dimension->width}}X{{$dimension->height}}<br />
                                    @endforeach
                                    @endif
                                </p>
                                <br>

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

                    </div>
                </div>
            </div>
            <!-- END: CONTENT/SHOPS/SHOP-PRODUCT-TAB-2 -->
            <!-- END: PAGE CONTENT -->
        </div>
    </div>
</div>
<script>


</script> 
<!-- END: PAGE CONTAINER -->

@endsection

@section('custom-js')
<!-- BEGIN: PAGE SCRIPTS -->
<script src="/jango/assets/plugins/zoom-master/jquery.zoom.min.js" type="text/javascript"></script>
<!-- END: PAGE SCRIPTS -->

<script>
    $("#dimension").change(function () {
        
         
    });


</script>


@endsection

