@extends('layouts.admin.layout')

@section('seo-title')
<title> All pages {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
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
            <h1 class="page-header">All pages</h1>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pages) > 0)
                                @foreach($pages as $page)
                                <tr>
                                    <td>
                                        <?php 
                                        if(isset($page->image)){
                                            $extension = pathinfo($page->image, PATHINFO_EXTENSION); 
                                            $extension = substr($page->image, -(strlen($extension) + 1));
                                            $image = str_replace($extension, "-s" . $extension, $page->image);
                                            $imageXL = str_replace($extension, "-xl" . $extension, $page->image);
                                            ?>
                                            <img class="img-responsive center-block" src="{{ $image }}" data-src='{{ $imageXL }}' data-toggle="modal" data-target="#imagePreviewModal" data-pagetitle="{{ $page->title }}">
                                            <?php
                                        }
                                            
                                        ?>  
                                    </td>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->description }}</td>
                                    <td class="text-right">
                                        <a data-placement="top" title="Edit page" href="{{ route('pages-edit', $page->id) }}" class="btn btn-success btn-xs btn-tooltip">Edit</a>
                                        @if($page->visible == 0)
                                        <a data-placement="top" title="Show page" data-modaltitle="Show page" data-modalbody="Are you sure that you want activate page '{{$page->title}}'?" data-buttontext='Show' data-pageid="{{ $page->id }}" data-href="{{ route('pages-change-status', $page->id) }}"  data-pagetitle="{{ $page->title }}" class="btn btn-warning btn-xs btn-tooltip" data-toggle="modal" data-target="#myModal">Show</a>
                                        @else
                                        <a data-placement="top" title="Hide page" data-modaltitle="Hide page" data-modalbody="Are you sure that you want hide page '{{$page->title}}'?" data-buttontext='Hide' data-pageid="{{ $page->id }}" data-href="{{ route('pages-change-status', $page->id) }}"  data-pagetitle="{{ $page->title }}" class="btn btn-success btn-xs btn-tooltip" data-toggle="modal" data-target="#myModal">Hide</a>
                                        @endif
                                        <a data-placement="top" title="Delete image" data-modaltitle="Delete image" data-modalbody="Are you sure that you want to delete image for page '{{$page->title}}'?" data-buttontext='Delete image' data-pageid="{{ $page->id }}" data-href="{{ route('pages-delete-image', $page->id) }}"  data-pagetitle="{{ $page->title }}" class="btn btn-danger btn-xs btn-tooltip" data-toggle="modal" data-target="#myModal">Delete image</a>
                                        <a data-placement="top" title="Delete page" data-modaltitle="Delete page" data-modalbody="Are you sure that you want to delete page '{{$page->title}}'?" data-buttontext='Delete page' data-pageid="{{ $page->id }}" data-href="{{ route('pages-delete', $page->id) }}"  data-pagetitle="{{ $page->title }}" class="btn btn-danger btn-xs btn-tooltip" data-toggle="modal" data-target="#myModal">Delete</a>

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
<!-- /.container-fluid -->

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
    var pageTitle = button.data('pagetitle');// Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text(button.data('modaltitle'));
    modal.find('.modal-body').text(button.data('modalbody'));
    modal.find('.modal-button').text(button.data('buttontext'));
    modal.find('.modal-button').attr('href', button.data('href'));
})

$('#imagePreviewModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text("Preview image for page: " + button.data('pagetitle'));
    modal.find('#image-preview').attr('src', button.data('src'));
})

$(function () {
  $('.btn-tooltip').tooltip();
})

</script>
@endsection