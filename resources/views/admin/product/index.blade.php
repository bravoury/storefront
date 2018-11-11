@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('storefront::product.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('storefront::product.names') !!}</small>
@stop

@section('title')
{!! trans('storefront::product.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('storefront::product.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='storefront-product-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="storefront-product-list" class="table table-striped table-bordered">
    <thead>
        
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#storefront-product-entry', '{!!URL::to('admin/storefront/product/0')!!}');
    oTable = $('#storefront-product-list').dataTable( {
        "ajax": '{!! URL::to('/admin/storefront/product') !!}',
        "columns": [
            
        ],
        "pageLength": 50
    });

    $('#storefront-product-list tbody').on( 'click', 'tr', function () {

        if ($(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        } else {
            oTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        var d = $('#storefront-product-list').DataTable().row( this ).data();

        $('#storefront-product-entry').load('{!!URL::to('admin/storefront/product')!!}' + '/' + d.id);

    });
});
</script>
@stop

@section('style')
@stop

