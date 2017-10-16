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
                    
                    @if($page->layout == 'leftbar')
                        @include('layouts.jango.partials.sidebar')
                    @endif
                    
                    <div class="@if($page->layout == 'fullwidth') col-md-12 @else col-md-9 @endif">
                        <div class="c-content-blog-post-1-view">
                            <div class="c-content-blog-post-1">
                                @if(!empty($page->image))
                                    <div class="c-media">
                                        <div class="c-content-media-2-slider" data-slider="owl">
                                            <div class="owl-theme c-theme owl-single" data-single-item="true" data-auto-play="4000" data-rtl="false">
                                                <div class="item">
                                                    <div class="c-content-media-2" style="background-image: url({{ $page->image }}); min-height: 460px;"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="c-title c-font-bold c-font-uppercase">
                                    {{ $page->title }}
                                </div>
                                
                                <div class="c-desc">
                                    {!! $page->text !!}
                                </div>
                                
                                @if($page->contact_form == 1)
                                <div class="c-comments">
                                    <div class="c-content-title-1">
                                        <h3 class="c-font-uppercase c-font-bold">Contact form</h3>
                                        <div class="c-line-left"></div>
                                    </div>
                                    @if(!session('message'))
                                    <form action="{{ route('contact-form') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input name="name" value='{{ old('name') }}' type="text" placeholder="Your Name" class="form-control c-square"> 
                                        </div>
                                        <div class="form-group">
                                            <input name="email" value='{{ old('email') }}' type="text" placeholder="Your Email" class="form-control c-square"> 
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="8" name="text" placeholder="Write comment here ..." class="form-control c-square">{{ old('text') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn c-theme-btn c-btn-uppercase btn-md c-btn-sbold btn-block c-btn-square">Submit</button>
                                        </div>
                                    </form>
                                    @endif
                                    
                                    @include('layouts.jango.partials.message')
                                    
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    @if($page->layout == 'rightbar')
                        @include('layouts.jango.partials.sidebar')
                    @endif
                    
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
