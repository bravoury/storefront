@include('public::notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> {{ trans('cms.create')  }} Product </h4>
        </div>
        <div class="col-md-6">
            <a href="{{ trans_url('/user/storefront/product') }}" class="btn btn-default pull-right"> {{ trans('cms.back')  }}</a>
        </div>
    </div>
    <p class="text-muted m-b-25 font-13">
        Your awesome text goes here.
    </p>
    <hr/>

    {!!Form::horizontal_open()
    ->id('create-storefront-product')
    ->method('POST')
    ->files('true')
    ->action(URL::to('user/storefront/product'))!!}
            @include('storefront::user.product.partial.entry')
    {!! Form::close() !!}
</div>