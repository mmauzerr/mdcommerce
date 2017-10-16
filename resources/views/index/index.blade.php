@extends('layouts.jango.layout')

@section('seo-title')
<title>Title</title>
@endsection

@section('content')
    <!-- BEGIN: PAGE CONTAINER -->
    <div class="c-layout-page">
        
       @include('layouts.jango.partials.feature1')
       @include('layouts.jango.partials.feature2')
       @include('layouts.jango.partials.feature3')
       @include('layouts.jango.partials.feature4')
       @include('layouts.jango.partials.testemonials')
       @include('layouts.jango.partials.contact')
       @include('layouts.jango.partials.feedback')
        
       
    </div>
    <!-- END: PAGE CONTAINER -->
@endsection

@section('custom-js')

@endsection