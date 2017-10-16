@extends('layouts.admin.layout')

@section('seo-title')
<title> Create new menu item {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create new menu item</h1>
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
                        <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                            <label>* Choose parent for menu item</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">-- Without parent (Level 0) --</option>
                                @if(count($menusFirstLevel) > 0)
                                    @foreach($menusFirstLevel as $menu)
                                    <option value="{{ $menu->id }}" @if(old('parent_id') == $menu->id) selected @endif>{{ $menu->title }}</option>
                                    @if(count($menu->submenus) > 0)
                                        @foreach($menu->submenus as $menu)
                                        <option style="text-indent: 30px;" value="{{ $menu->id }}" @if(old('parent_id') == $menu->id) selected @endif>{{ $menu->title }}</option>
                                        @endforeach
                                    @endif
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('parent_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('parent_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ ($errors->has('position') || $errors->has('position.*')) ? ' has-error' : '' }}">
                            <label>* Show on positions</label>
                            <div class="checkbox">
                                <label>
                                    <input name="position[]" type="checkbox" value="top" @if(!empty(old('position')) && in_array('top', old('position'))) checked @endif>Top menu
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="position[]" type="checkbox" value="header" @if(!empty(old('position')) && in_array('header', old('position'))) checked @endif>Header
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="position[]" type="checkbox" value="sidebar" @if(!empty(old('position')) && in_array('sidebar', old('position'))) checked @endif>Sidebar
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="position[]" type="checkbox" value="footer" @if(!empty(old('position')) && in_array('footer', old('position'))) checked @endif>Footer
                                </label>
                            </div>
                            @if ($errors->has('position') || $errors->has('position.*'))
                                <span class="help-block">
                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('position') }}</strong>
                                        </span>
                                    @endif
                                    @if ($errors->has('position.*'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('position.*') }}</strong>
                                        </span>
                                    @endif
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label>* Menu type</label>
                            <select class="form-control" name="type" id="type">
                                <option value="">-- Choose menu type --</option>
                                <option value="just-title" @if(old('type') == 'just-title') selected @endif>Just title</option>
                                <option value="internal-link" @if(old('type') == 'internal-link') selected @endif>Internal link</option>
                                <option value="external-link" @if(old('type') == 'external-link') selected @endif>External link</option>
                                <option value="page" @if(old('type') == 'page') selected @endif>Page</option>
                                <option value="products" @if(old('type') == 'products') selected @endif>Products</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div id="internal-container" class="form-group{{ $errors->has('internal-link-value') ? ' has-error' : '' }}">
                            <label>* Set internal link: </label>
                            <input class="form-control" type="text" name="internal-link-value" value="{{ old('internal-link-value') }}">
                            @if ($errors->has('internal-link-value'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('internal-link-value') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div id="external-container"  class="form-group{{ $errors->has('external-link-value') ? ' has-error' : '' }}">
                            <label>* Set external link: </label>
                            <input class="form-control" type="text" name="external-link-value" value="{{ old('external-link-value') }}">
                            @if ($errors->has('external-link-value'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('external-link-value') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div id="page-container"  class="form-group{{ $errors->has('page-value') ? ' has-error' : '' }}">
                            <label>* Set page</label>
                            <select class="form-control" name="page-value">
                                <option value="">-- Choose page for link --</option>
                                @if(count($pages) > 0)
                                    @foreach($pages as $page)
                                    <option value="{{ $page->id }}" @if(old('page-value') == $page->id) selected @endif>{{ $page->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('page-value'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('page-value') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div id="products-container"  class="form-group{{ $errors->has('products-value') ? ' has-error' : '' }}">
                            <label>* Set product</label>
                            <select class="form-control" name="products-value">
                                <option value="">-- Choose product for link --</option>
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if(old('page-value') == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('products-value'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('products-value') }}</strong>
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
<script>
$("#type").change(function(){
    $("#internal-container").hide();
    $("#external-container").hide();
    $("#page-container").hide();
    $("#products-container").hide();
    
    var type = $("#type").val();
    switch (type) {
        case 'internal-link':
            $("#internal-container").show();
            break;
        case 'external-link':
            $("#external-container").show();
            break;
        case 'page':
            $("#page-container").show();
            break;
            case 'products':
            $("#products-container").show();
            break;
    }
});    
    
    
$(document).ready(function(){
    $("#internal-container").hide();
    $("#external-container").hide();
    $("#page-container").hide();
    
    $("#type").change();
});
</script>
@endsection