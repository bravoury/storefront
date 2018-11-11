<?php

namespace Xetam\Storefront\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class ProductListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductListTransformer();
    }
}