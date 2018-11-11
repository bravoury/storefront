<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.new') }}  {!! trans('storefront::product.name') !!} </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#storefront-product-create'  data-load-to='#storefront-product-entry' data-datatable='#storefront-product-list'><i class="fa fa-floppy-o"></i> cms.save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#storefront-product-entry' data-href='{{Trans::to('admin/storefront/product/0')}}'><i class="fa fa-times-circle"></i> {{ trans('cms.close') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Product</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('storefront-product-create')
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