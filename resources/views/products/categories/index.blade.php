
@extends('layouts.admin.layout')

@section('seo-title')
<title> All products categories {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
@endsection

@section('plugins-css')
<!-- DataTables CSS -->
<link href="/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All products categories</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    @include('layouts.admin.partials.message')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center">Image</th>
                                <th>Name</th>
                                <th>Text</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                              @if(count($categories) > 0)
                            @foreach($categories as $category)
                            <tr>
                                <td> <?php 
                                        if(isset($category->image)){
                                            $extension = pathinfo($category->image, PATHINFO_EXTENSION); 
                                            $extension = substr($category->image, -(strlen($extension) + 1));
                                            $image = str_replace($extension, "-s" . $extension, $category->image);
                                            $imageXL = str_replace($extension, "-xl" . $extension, $category->image);
                                            ?>
                                            <img class="img-responsive center-block" src="{{ $image }}" data-src='{{ $imageXL }}' data-toggle="modal" data-target="#imagePreviewModal" data-pagetitle="{{ $category->name }}">
                                            <?php
                                        }
                                            
                                        ?> 
                                </td>
                               
                                <td>{{$category->name}}</td>
                                <td>{!!$category->text!!}</td>
                                <td class="text-right">
                                    <a data-placement="top" title="Edit category" href="{{ route('products-category-edit', $category->id) }}" class="btn btn-success btn-xs btn-tooltip">Edit</a>
                                    @if($category->visible == 0)
                                        <a data-placement="top" title="Show category" data-modaltitle="Show category" data-modalbody="Are you sure that you want activate category '{{$category->name}}'?" data-buttontext='Show' data-pageid="{{ $category->id }}" data-href="{{ route('products-category-change-status', $category->id) }}"  data-pagetitle="{{ $category->name }}" class="btn btn-warning btn-xs btn-tooltip" data-toggle="modal" data-target="#myModal">Show</a>
                                        @else
                                        <a data-placement="top" title="Hide category" data-modaltitle="Hide category" data-modalbody="Are you sure that you want hide category '{{$category->name}}'?" data-buttontext='Hide' data-pageid="{{ $category->id }}" data-href="{{ route('products-category-change-status', $category->id) }}"  data-pagetitle="{{ $category->name }}" class="btn btn-success btn-xs btn-tooltip" data-toggle="modal" data-target="#myModal">Hide</a>
                                        @endif
                                        <a data-placement="top" title="Delete image" data-modaltitle="Delete image" data-modalbody="Are you sure that you want to delete image for page '{{$category->name}}'?" data-buttontext='Delete image' data-pageid="{{ $category->id }}" data-href="{{ route('products-category-delete-image', $category->id) }}"  data-pagetitle="{{ $category->name }}" class="btn btn-danger btn-xs btn-tooltip" data-toggle="modal" data-target="#myModal">Delete image</a>
                                        <a data-placement="top" title="Delete category" data-modaltitle="Delete category" data-modalbody="Are you sure that you want to delete category '{{$category->name}}'?" data-buttontext='Delete category' data-pageid="{{ $category->id }}" data-href="{{ route('products-category-delete', $category->id) }}"  data-pagetitle="{{ $category->name }}" class="btn btn-danger btn-xs btn-tooltip" data-toggle="modal" data-target="#myModal">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                              @endif
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>


<!-- Modal for image preview-->
<div class="modal fade" id="imagePreviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="imageModalLabel"></h4>
            </div>
            <div class="modal-body text-center">
                <img src="" class="img-responsive center-block" id='image-preview'>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal for option buttons-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="" type="button" class="btn btn-danger modal-button"></a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection


@section('plugins-js')
<!-- DataTables JavaScript -->
<script src="/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>
@endsection

@section('custom-js')
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        order: [ 1, "asc" ],
        responsive: true,
        columnDefs: [
            { 
                orderable: false, targets: [0,3]
            },
            { 
                searchable: false, targets: [0,3]
            }
        ]
    });
});

$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var pageId = button.data('pageid');
    var pageHref = button.data('href');
    var pageTitle = button.data('pagetitle');
    var modal = $(this);
    modal.find('.modal-title').text(button.data('modaltitle'));
    modal.find('.modal-body').text(button.data('modalbody'));
    modal.find('.modal-button').text(button.data('buttontext'));
    modal.find('.modal-button').attr('href', button.data('href'));
});


$('#imagePreviewModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var modal = $(this);
    modal.find('.modal-title').text("Preview image for page: " + button.data('pagetitle'));
    modal.find('#image-preview').attr('src', button.data('src'));
});

$(function () {
  $('.btn-tooltip').tooltip();
});
</script>
@endsection