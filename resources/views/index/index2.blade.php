@extends('layouts.jango.layout')

@section('seo-title')
<title>Title</title>
@endsection

@section('content')
    <!-- BEGIN: PAGE CONTAINER -->
    <div class="c-layout-page">

        <!--@include('layouts.jango.partials.breadcrumbs')-->
        
        <!-- BEGIN: PAGE CONTENT -->
        <!-- BEGIN: BLOG LISTING -->
        <div class="c-content-box c-size-md">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="c-content-blog-post-1-view">
                            
                        </div>
                    </div>
                    
                    @include('layouts.jango.partials.sidebar')
                    
                </div>
            </div>
        </div>
        <!-- END: BLOG LISTING  -->
        <!-- END: PAGE CONTENT -->
    </div>
    <!-- END: PAGE CONTAINER -->
@endsection

@section('custom-js')

@endsection