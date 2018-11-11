<?php

namespace Xetam\Storefront\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Xetam\Storefront\Models\Storefront;
use Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Xetam\Storefront\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param   \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        if (Request::is('*/storefront/product/*')) {
            $router->bind('product', function ($id) {
                $product = $this->app->make('\Xetam\Storefront\Interfaces\ProductRepositoryInterface');
                return $product->findorNew($id);
            });
        }
if (Request::is('*/storefront/product/*')) {
            $router->bind('product', function ($id) {
                $product = $this->app->make('\Xetam\Storefront\Interfaces\ProductRepositoryInterface');
                return $product->findorNew($id);
            });
        }

    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require __DIR__ . '/../Http/routes.php';
        });
    }
}
