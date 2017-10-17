
@extends('layouts.admin.layout')

@section('seo-name')
<name> Create new product {{ config('app.seo-name-separator') }} {{ config('app.name') }}</name>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit {{$product->name}}</h1>
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
                        
                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label>* Choose category</label>
                            <select class="form-control" name="category_id" autofocus id="category_id">
                                <option value="0">-- Choose category --</option>
                                @if(count($categories) > 0)
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(old('category_id',$product->category_id) == $category->id) selected @endif>{{ $category->name }}</option>

                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>* Title: </label>
                            <input class="form-control" type="text" name="name" value="{{ old('name',$product->name) }}">
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label>Description: </label>
                            <textarea class="form-control" rows="3" name="description">{{ old('description',$product->description) }}</textarea>
                            @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label>* Text: </label>
                            <textarea class="form-control" rows="3" name="text"  id="text">{{ old('text',$product->text) }}</textarea>
                            @if ($errors->has('text'))
                            <span class="help-block">
                                <strong>{{ $errors->first('text') }}</strong>
                            </span>
                            @endif
                        </div>  
                        
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label>Image: </label>
                            <input type="file" name="image">
                            @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                        </div>
                       
                        
                        <div class="dimension form-group{{ $errors->has('type') ? ' has-error' : '' }}"
                             
                            <label>* Choose type </label>
                            <select class="form-control" name="type" >
                                
                                <option value="0">-- Choose type --</option>
                                <option value="net"@if(old('type',$product->type) == "net") selected @endif >Box zicano jezgro</option>
                                <option value="foam"@if(old('type',$product->type) == "foam") selected @endif >Poliuretanska pena</option>
                            </select>
                            @if ($errors->has('type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="height form-group{{ $errors->has('height_id') ? ' has-error' : '' }}">
                            <label>* Choose height</label>
                            <select class="form-control" name="height_id">
                                <option value="0">-- Choose height --</option>
                                @if(count($heights) > 0)
                                @foreach($heights as $height)
                                <option value="{{ $height->id }}" @if(old('height_id',$product->height_id) == $height->id) selected @endif>{{ $height->name }}</option>

                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('height_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('height_id') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                         <?php
                            $currentPositions = $product->dimension_id;
                            // delete #
                            $currentPositions = str_replace("#", "", $currentPositions);
                            // make array from string
                            $currentPositions = explode(",", $currentPositions);
                        ?>
                        <div  class="dimension height form-group{{ ($errors->has('dimension_id') || $errors->has('dimension_id.*')) ? ' has-error' : '' }}" >
                            <label>* Show on dimensions</label>
                            @if(count($dimensions)>0)
                            @foreach($dimensions as $dimension)
                            <div class="checkbox">
                                <label>
                                    <input name="dimension_id[]" type="checkbox" value="{{$dimension->id}}" @if(!empty(old('dimension_id', $currentPositions)) && in_array($dimension->id, old('dimension_id', $currentPositions))) checked @endif>{{$dimension->height}}x{{$dimension->width}}
                                </label>
                            </div>
                            @endforeach
                            @endif
                            @if ($errors->has('dimension_id') || $errors->has('dimension_id.*'))
                            <span class="help-block">
                                @if ($errors->has('dimension_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dimension_id') }}</strong>
                                </span>
                                @endif

                            </span>
                            @endif
                        </div>
                        
                        <div  id="color" class="form-group{{ ($errors->has('color_id') || $errors->has('color_id.*')) ? ' has-error' : '' }}" >
                            <label>* Show on colors</label>
                            @if(count($colors)>0)
                            @foreach($colors as $color)
                            <div class="checkbox">
                                <label>
                                    <input name="color_id[]" type="checkbox" value="{{$color->id}}" >{{$color->name}}
                                </label>
                            </div>
                            @endforeach
                            @endif
                            @if ($errors->has('color_id') || $errors->has('color_id.*'))
                            <span class="help-block">
                                @if ($errors->has('color_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('color_id') }}</strong>
                                </span>
                                @endif

                            </span>
                            @endif
                        </div>
                        
                       
                        <div id="foam" class="height form-group{{ ($errors->has('foam_id') || $errors->has('foam_id.*')) ? ' has-error' : '' }}" >
                            <label>* Show on foam</label>
                            @if(count($foams)>0)
                            @foreach($foams as $foam)
                            <div class="checkbox">
                                <label>
                                    <input name="foam_id[]" type="checkbox" value="{{$foam->id}}" >{{$foam->name}}

                                </label>
                            </div>
                            @endforeach
                            @endif
                            @if ($errors->has('foam_id') || $errors->has('foam_id.*'))
                            <span class="help-block">
                                @if ($errors->has('foam_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('foam_id') }}</strong>
                                </span>
                                @endif

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
CKEDITOR.replace('text');
</script>

<script>

    $("#category_id").change(function () {

        $(".dimension").hide();
        $("#color").hide();
        $("#foam").hide();


        var category_id = $("#category_id").val();



        switch (category_id) {
            case '1':
                $(".dimension").show();
                break;
            case '2':
                $("#color").show();
                break;
            case '3':
                $("#foam").show();
                break;

        }
    });
    $(document).ready(function () {
        $(".dimension").hide();
        $("#color").hide();
        $("#foam").hide();

        $("#category_id").change();
    });
    


</script>
@endsection