@extends('layouts.admin.layout')

@section('seo-title')
<title> Menu {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
@endsection

@section('plugins-css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Menu</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    @include('layouts.admin.partials.message')
    
    <div class="alert alert-info">
        <a href="{{ route('menus-list') }}">Home</a>        
        @if(!empty($menu->id))
            @if($menu->parent_id > 0)
                / <a href="{{ route('menus-list', $menu->parent_id) }}">{{ $menu->topmenu->title }}</a>
            @endif
        / <a href="{{ route('menus-list', $menu->id) }}">{{ $menu->title }}</a>
        @endif
        
        <button id="submit-form" type="button" class="btn btn-success btn-circle btn-sm pull-right">
            <i class="fa fa-check"></i>
        </button>
        
        <button id="activate-sortable" type="button" class="btn btn-warning btn-circle btn-sm pull-right">
            <i class="fa fa-list"></i>
        </button>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(count($menusFirstLevel) > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center default-hide">#</th>
                                    <th>Title</th>
                                    <th>Url (slug)</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody id='sortable'>
                                @foreach($menusFirstLevel as $value)
                                <tr id="{{ $value->id }}" @if($value->visible == 0) class='danger' @endif>
                                    <td class="text-center default-hide">{{ $value->priority + 1 }}</td>
                                    <td>
                                        <a @if(count($value->submenus) > 0) href="{{ route('menus-list', $value->id) }}" @endif class="btn btn-default btn-xs"><span class="fa fa-tasks"></span></a>
                                        {{ $value->title }} ({{ count($value->submenus) }})
                                    </td>
                                    <td>
                                        {{ $value->getSlug() }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-default btn-sm" href="{{ route('menus-edit', $value->id) }}"><span class="fa fa-pencil"></span></a>
                                            @if($value->visible == 1)
                                            <a class="btn btn-default btn-sm" href="{{ route('menus-change-status', $value->id) }}"><span class="fa fa-times"></span></a>
                                            @else
                                            <a class="btn btn-default btn-sm" href="{{ route('menus-change-status', $value->id) }}"><span class="fa fa-check"></span></a>
                                            @endif
                                            <a class="btn btn-default btn-sm" href="{{ route('menus-delete', $value->id) }}"><span class="fa fa-trash"></span></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /.container-fluid -->
<form id="order-state-form" method="post" action="/menus/reorder" class="hide">
    {{ csrf_field() }}
    <input name="menu" value="<?php if(!empty($menu->id)){ echo $menu->id; }else{ echo 0; } ?>">
    <input id="order-state" type="text" name="new-state" value="">
</form>

@endsection

@section('plugins-js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('custom-js')
  <script>
  $(document).ready(function(){
      $("#submit-form").hide();
      $(".default-hide").hide();
  });    
  
  $("#submit-form").click(function(){
      $('#order-state-form').submit();
  });
  
  $("#activate-sortable").click(function(){
    $(this).hide();
    $(".default-hide").show();
      
    $( "#sortable" ).sortable({
        update: function(){
            var state = $(this).sortable('toArray').toString();
            $("#order-state").val(state);
            $("#submit-form").show();
        }
    });
    
  });  
  </script>
@endsection