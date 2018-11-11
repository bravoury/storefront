<?php

namespace Xetam\Storefront\Http\Controllers;

use App\Http\Controllers\PublicWebController as PublicController;
use Xetam\Storefront\Interfaces\ProductRepositoryInterface;

class ProductPublicWebController extends PublicController
{
    /**
     * Constructor.
     *
     * @param type \Xetam\Product\Interfaces\ProductRepositoryInterface $product
     *
     * @return type
     */
    public function __construct(ProductRepositoryInterface $product)
    {
        $this->repository = $product;
        parent::__construct();
    }

    /**
     * Show product's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $products = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        return $this->theme->of('storefront::public.product.index', compact('products'))->render();
    }

    /**
     * Show product.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $product = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('storefront::public.product.show', compact('product'))->render();
    }
}
