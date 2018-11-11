<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'xetam',

    /*
     * Package.
     */
    'package'   => 'storefront',

    /*
     * Modules.
     */
    'modules'   => ['product', 
'product'],


    'product'       => [
        'model'             => 'Xetam\Storefront\Models\Product',
        'table'             => 'products',
        'presenter'         => \Xetam\Storefront\Repositories\Presenter\ProductItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => ['slug' => 'name'],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['user_id', 'product_description',  'product_name'],
        'translate'         => ['product_description',  'product_name'],

        'upload-folder'     => '/uploads/storefront/product',
        'uploads'           => [
                                    'single'    => [],
                                    'multiple'  => [],
                               ],
        'casts'             => [
                               ],
        'revision'          => [],
        'perPage'           => '20',
        'search'        => [
            'name'  => 'like',
            'status',
        ],
    ],
'product'       => [
        'model'             => 'Xetam\Storefront\Models\Product',
        'table'             => 'products',
        'presenter'         => \Xetam\Storefront\Repositories\Presenter\ProductItemPresenter::class,
        'hidden'            => [],
        'visible'           => [],
        'guarded'           => ['*'],
        'slugs'             => ['slug' => 'name'],
        'dates'             => ['deleted_at'],
        'appends'           => [],
        'fillable'          => ['user_id', 'custom_label'],
        'translate'         => ['custom_label'],

        'upload-folder'     => '/uploads/storefront/product',
        'uploads'           => [
                                    'single'    => [],
                                    'multiple'  => [],
                               ],
        'casts'             => [
                               ],
        'revision'          => [],
        'perPage'           => '20',
        'search'        => [
            'name'  => 'like',
            'status',
        ],
    ],
];
