<?php

namespace Xetam\Storefront\Http\Controllers;

use App\Http\Controllers\PublicApiController as PublicController;
use Xetam\Storefront\Interfaces\ProductRepositoryInterface;
use Xetam\Storefront\Repositories\Presenter\ProductItemTransformer;

/**
 * Pubic API controller class.
 */
class ProductPublicApiController extends PublicController
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
        $products = $this->repository
            ->setPresenter('\\Xetam\\Storefront\\Repositories\\Presenter\\ProductListPresenter')
            ->scopeQuery(function($query){
                return $query->orderBy('id','DESC');
            })->paginate();

        $products['code'] = 2000;
        return response()->json($products)
                ->setStatusCode(200, 'INDEX_SUCCESS');
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
        $product = $this->repository
            ->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        if (!is_null($product)) {
            $product         = $this->itemPresenter($module, new ProductItemTransformer);
            $product['code'] = 2001;
            return response()->json($product)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }
}
