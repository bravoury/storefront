<?php

namespace Xetam\Storefront\Http\Controllers;

use App\Http\Controllers\AdminWebController as AdminController;
use Form;
use Xetam\Storefront\Http\Requests\ProductAdminWebRequest;
use Xetam\Storefront\Interfaces\ProductRepositoryInterface;
use Xetam\Storefront\Models\Product;

/**
 * Admin web controller class.
 */
class ProductAdminWebController extends AdminController
{
    /**
     * Initialize product controller.
     *
     * @param type ProductRepositoryInterface $product
     *
     * @return type
     */
    public function __construct(ProductRepositoryInterface $product)
    {
        $this->repository = $product;
        parent::__construct();
    }

    /**
     * Display a list of product.
     *
     * @return Response
     */
    public function index(ProductAdminWebRequest $request)
    {
        if ($request->wantsJson()) {
            $products  = $this->repository->setPresenter('\\Xetam\\Storefront\\Repositories\\Presenter\\ProductListPresenter')
                                                ->scopeQuery(function($query){
                                                    return $query->orderBy('id','DESC');
                                                })->all();
            return response()->json($products, 200);

        }
        $this   ->theme->prependTitle(trans('storefront::product.names').' :: ');
        return $this->theme->of('storefront::admin.product.index')->render();
    }

    /**
     * Display product.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return Response
     */
    public function show(ProductAdminWebRequest $request, Product $product)
    {
        if (!$product->exists) {
            return response()->view('storefront::admin.product.new', compact('product'));
        }

        Form::populate($product);
        return response()->view('storefront::admin.product.show', compact('product'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ProductAdminWebRequest $request)
    {

        $product = $this->repository->newInstance([]);

        Form::populate($product);

        return response()->view('storefront::admin.product.create', compact('product'));

    }

    /**
     * Create new product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ProductAdminWebRequest $request)
    {
        try {
            $attributes             = $request->all();
            $attributes['user_id']  = user_id('admin.web');
            $product          = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('storefront::product.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/storefront/product/'.$product->getRouteKey())
            ], 201);


        } catch (Exception $e) {
            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
            ], 400);
        }
    }

    /**
     * Show product for editing.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return Response
     */
    public function edit(ProductAdminWebRequest $request, Product $product)
    {
        Form::populate($product);
        return  response()->view('storefront::admin.product.edit', compact('product'));
    }

    /**
     * Update the product.
     *
     * @param Request $request
     * @param Model   $product
     *
     * @return Response
     */
    public function update(ProductAdminWebRequest $request, Product $product)
    {
        try {

            $attributes = $request->all();

            $product->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('storefront::product.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/storefront/product/'.$product->getRouteKey())
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/storefront/product/'.$product->getRouteKey()),
            ], 400);

        }
    }

    /**
     * Remove the product.
     *
     * @param Model   $product
     *
     * @return Response
     */
    public function destroy(ProductAdminWebRequest $request, Product $product)
    {

        try {

            $t = $product->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('storefront::product.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/storefront/product/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/storefront/product/'.$product->getRouteKey()),
            ], 400);
        }
    }
}
