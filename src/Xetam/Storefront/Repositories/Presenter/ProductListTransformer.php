<?php

namespace Xetam\Storefront\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class ProductListTransformer extends TransformerAbstract
{
    public function transform(\Xetam\Storefront\Models\Product $product)
    {
        return [
            'id'                => $product->getRouteKey(),
            'custom_label'      => $product->custom_label,
        ];
    }
}