<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.view') }}   {!! trans('storefront::product.name') !!}  [{!! $product->name !!}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#storefront-product-entry' data-href='{{trans_url('admin/storefront/product/create')}}'><i class="fa fa-times-circle"></i> cms.new</button>
        @if($product->id )
        <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#storefront-product-entry' data-href='{{ trans_url('/admin/storefront/product') }}/{{$product->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> cms.edit</button>
        <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#storefront-product-entry' data-datatable='#storefront-product-list' data-href='{{ trans_url('/admin/storefront/product') }}/{{$product->getRouteKey()}}' >
        <i class="fa fa-times-circle"></i> cms.delete
        </button>
        @endif
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('storefront::product.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('storefront-product-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/storefront/product'))!!}
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    @include('storefront::admin.product.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>