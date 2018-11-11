<?php

namespace Xetam\Storefront\Repositories\Eloquent;

use Xetam\Storefront\Interfaces\ProductRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'  => 'like'
    ];

    public function boot()
    {
        $this->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('package.storefront.product.model');
    }
}
