
@extends('layouts.admin.layout')

@section('seo-name')
<name> Create new product {{ config('app.seo-name-separator') }} {{ config('app.name') }}</name>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create new price</h1>
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

                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}" >
                            <label>* Choose category</label>
                            <select class="form-control" name="category_id" autofocus id="type">
                                <option value="0">-- Choose category --</option>
                                @if(count($categories) > 0)
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>

                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('category_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}" id="product-container">
                            <label>* Choose product</label>
                            <select class="form-control" name="product_id" >
                                <option value="0">-- Choose product --</option>
                                @if(count($products) > 0)
                                @foreach($products as $product)
                                
                                <option value="{{ $product->id }}" @if(old('product_id') == $product->id) selected @endif>{{ $product->name }}</option>
                                
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('product_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('product_id') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('dimension_id') ? ' has-error' : '' }}" id="dimension-container">
                            <label> Choose dimension</label>
                            <select class="form-control" name="dimension_id">
                                <option value="0">-- Choose dimension --</option>
                                @if(count($dimensions) > 0)
                                @foreach($dimensions as $dimension)
                                <option value="{{ $dimension->id }}" @if(old('dimension_id') == $dimension->id) selected @endif>{{ $dimension->height }}x{{$dimension->width}}</option>

                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('dimension_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dimension_id') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}" id="price-container">
                            <label>* Price: </label>
                            <input class="form-control" type="text" name="price" value="{{ old('price') }}">
                            @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}" id="discount-container">
                            <label> Discount: </label>
                            <input class="form-control" type="text" name="discount" value="{{ old('discount') }}">
                            @if ($errors->has('discount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('discount') }}</strong>
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
    $("#type").change(function () {
        $("#dimension-container").hide();
        $("#product-container").hide();
        $("#price-container").hide();
        $("#discount-container").hide();


        var type = $("#type").val();
        switch (type) {
            case '1':
                $("#product-container").show();
                $("#dimension-container").show();
                $("#price-container").show();
                $("#discount-container").show();
                break;
             case '2':
                 $("#product-container").show();
                $("#price-container").show();
                $("#discount-container").show();
                break;
            case '3':
                 $("#product-container").show();
                $("#price-container").show();
                $("#discount-container").show();
                break;

        }
    });


    $(document).ready(function () {
        $("#dimension-container").hide();
        $("#product-container").hide();
        $("#price-container").hide();
        $("#discount-container").hide();

        $("#type").change();
    });
</script>
@endsection
