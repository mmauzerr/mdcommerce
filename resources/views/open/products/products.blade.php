@extends('layouts.jango.layout')

@section('seo-title')
<title>Title</title>
@endsection

@section('content')
    <!-- BEGIN: PAGE CONTAINER -->
    <div class="c-layout-page">

        @include('layouts.jango.partials.breadcrumbs')
        
        <!-- BEGIN: PAGE CONTENT -->
        <!-- BEGIN: BLOG LISTING -->
        <div class="c-content-box c-size-md">
            <div class="container">
                <div class="row">
                   <!-- BEGIN: PAGE CONTENT -->
            <div class="c-content-box c-size-md">
                <div class="container">
                    <div id="filters-container" class="cbp-l-filters-text">
                        <div class="cbp-l-filters-text-sort">Sortriraj po:</div>
                        <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> Svi
                            <div class="cbp-filter-counter"></div>
                        </div> /
                        <div data-filter=".height" class="cbp-filter-item"> Visini
                            <div class="cbp-filter-counter"></div>
                        </div> /
                        <div data-filter=".type" class="cbp-filter-item"> Tipu(pena ili feder)
                            <div class="cbp-filter-counter"></div>
                        </div> /
                        <div data-filter=".graphic" class="cbp-filter-item"> Graphic
                            <div class="cbp-filter-counter"></div>
                        </div> /
                        <div data-filter=".price" class="cbp-filter-item"> Ceni
                            <div class="cbp-filter-counter"></div>
                        </div>
                    </div>
                    <div id="grid-container" class="cbp cbp-l-grid-agency" >
                        @if(count($products) > 0)
                        @foreach($products as $product)                      
                        <div class="cbp-item graphic"  >
                            <a href="{{route('product',$product->id)}}">
                                <div class="cbp-caption ">
                                    <div class="cbp-caption-defaultWrap">
                                        
                                        <?php 
                                        if(isset($product->image)){
                                            $extension = pathinfo($product->image, PATHINFO_EXTENSION); 
                                            $extension = substr($product->image, -(strlen($extension) + 1));
                                            $image = str_replace($extension, "-l" . $extension, $product->image);
                                            
                                            ?>
                                        <img src="{{ $image }}" alt="{{$product->title}}" >
                                            <?php
                                        }
                                            
                                        ?>  
                                        </div>
                                </div>
                                <div class="cbp-l-grid-agency-title">{{$product->name}}</div>
                                <div class="cbp-l-grid-agency-desc">{{$product->description}}</div>
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    
                </div>
            </div>
            <!-- END: PAGE CONTENT --> 
                    
                </div>
            </div>
        </div>
        <!-- END: BLOG LISTING  -->
        <!-- END: PAGE CONTENT -->
    </div>
    <!-- END: PAGE CONTAINER -->
@endsection

@section('custom-js')
    <script src="/jango/assets/base/js/scripts/pages/index-gallery.js" type="text/javascript"></script>
     
@endsection

