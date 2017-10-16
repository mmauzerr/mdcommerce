@extends('layouts.admin.layout')

@section('seo-title')
<title> Create new page {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create new page</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label>* Title: </label>
                            <input class="form-control" type="text" name="title" value="{{ old('title') }}" autofocus>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label>Description: </label>
                            <textarea class="form-control" rows="3" name="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label>* Text: </label>
                            <textarea class="form-control" rows="3" name="text" id="text">{{ old('text') }}</textarea>
                            @if ($errors->has('text'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                            <label>* Seo title: </label>
                            <input class="form-control" type="text" name="seo_title" value="{{ old('seo_title') }}">
                            @if ($errors->has('seo_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seo_title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                            <label>Seo description: </label>
                            <textarea class="form-control" rows="3" name="seo_description">{{ old('seo_description') }}</textarea>
                            @if ($errors->has('seo_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seo_description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('seo_keywords') ? ' has-error' : '' }}">
                            <label>Seo keywords: </label>
                            <input class="form-control" type="text" name="seo_keywords" value="{{ old('seo_keywords') }}">
                            @if ($errors->has('seo_keywords'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seo_keywords') }}</strong>
                                </span>
                            @endif
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label>Image: </label>
                            <input type="file" name="image">
                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('contact_form') ? ' has-error' : '' }}">
                            <label>* Contact form: </label>
                            <select class="form-control" name="contact_form">
                                <option value=''>-- Choose --</option>
                                <option value="0" @if(old('contact_form') == 0) selected  @endif>No</option>
                                <option value="1" @if(old('contact_form') == 1) selected  @endif>Yes</option>
                            </select>
                            
                            @if ($errors->has('contact_form'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('contact_form') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('layout') ? ' has-error' : '' }}">
                            <label>* Layout: </label>
                            <select class="form-control" name="layout">
                                <option value=''>-- Choose --</option>
                                <option value="fullwidth" @if(old('layout') == 'fullwidth') selected  @endif>Width 100%</option>
                                <option value="leftbar" @if(old('layout') == 'leftbar') selected  @endif>Page with left bar</option>
                                <option value="rightbar" @if(old('layout') == 'rightbar') selected  @endif>Page with right bar</option>
                            </select>
                            
                            @if ($errors->has('layout'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('layout') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>
                    <div class="panel-footer">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('custom-js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'text' );
</script>
@endsection