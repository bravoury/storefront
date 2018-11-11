<?php

namespace Xetam\Storefront\Http\Controllers;

use App\Http\Controllers\UserWebController as UserController;
use Form;
use Xetam\Storefront\Http\Requests\ProductUserWebRequest;
use Xetam\Storefront\Interfaces\ProductRepositoryInterface;
use Xetam\Storefront\Models\Product;

class ProductUserWebController extends UserController
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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ProductUserWebRequest $request)
    {
        $this->repository->pushCriteria(new \Lavalite\Storefront\Repositories\Criteria\ProductUserCriteria());
        $products = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();

        $this->theme->prependTitle(trans('storefront::product.names').' :: ');

        return $this->theme->of('storefront::user.product.index', compact('products'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Product $product
     *
     * @return Response
     */
    public function show(ProductUserWebRequest $request, Product $product)
    {
        Form::populate($product);

        return $this->theme->of('storefront::user.product.show', compact('product'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ProductUserWebRequest $request)
    {

        $product = $this->repository->newInstance([]);
        Form::populate($product);

        return $this->theme->of('storefront::user.product.create', compact('product'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ProductUserWebRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $product = $this->repository->create($attributes);

            return redirect(trans_url('/user/storefront/product'))
                -> with('message', trans('messages.success.created', ['Module' => trans('storefront::product.name')]))
                -> with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Product $product
     *
     * @return Response
     */
    public function edit(ProductUserWebRequest $request, Product $product)
    {

        Form::populate($product);

        return $this->theme->of('storefront::user.product.edit', compact('product'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Product $product
     *
     * @return Response
     */
    public function update(ProductUserWebRequest $request, Product $product)
    {
        try {
            $this->repository->update($request->all(), $product->getRouteKey());

            return redirect(trans_url('/user/storefront/product'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('storefront::product.name')]))
                ->with('code', 204);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(ProductUserWebRequest $request, Product $product)
    {
        try {
            $this->repository->delete($product->getRouteKey());
            return redirect(trans_url('/user/storefront/product'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('storefront::product.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
