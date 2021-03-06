<div class="box-header with-border">
    <h3 class="box-title"> cms.edit  {!! trans('storefront::product.name') !!} [{!!$product->name!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#storefront-product-edit'  data-load-to='#storefront-product-entry' data-datatable='#storefront-product-list'><i class="fa fa-floppy-o"></i> cms.save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#storefront-product-entry' data-href='{{Trans::to('admin/storefront/product')}}/{{$product->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#product" data-toggle="tab">{!! trans('storefront::product.tab.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('storefront-product-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/storefront/product/'. $product->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="product">
                @include('storefront::admin.product.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>