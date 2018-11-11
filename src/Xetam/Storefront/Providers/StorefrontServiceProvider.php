<?php

namespace Xetam\Storefront\Providers;

use Illuminate\Support\ServiceProvider;

class StorefrontServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../../../../resources/views', 'storefront');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../../../../resources/lang', 'storefront');

        // Call pblish redources function
        $this->publishResources();

        include __DIR__ . '/../Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind facade
        $this->app->bind('storefront', function ($app) {
            return $this->app->make('Xetam\Storefront\Storefront');
        });

// Bind Product to repository
        $this->app->bind(
            \Xetam\Storefront\Interfaces\ProductRepositoryInterface::class,
            \Xetam\Storefront\Repositories\Eloquent\ProductRepository::class
        );
        // Bind Product to repository
        $this->app->bind(
            \Xetam\Storefront\Interfaces\ProductRepositoryInterface::class,
            \Xetam\Storefront\Repositories\Eloquent\ProductRepository::class
        );

        $this->app->register(\Xetam\Storefront\Providers\AuthServiceProvider::class);
        $this->app->register(\Xetam\Storefront\Providers\EventServiceProvider::class);
        $this->app->register(\Xetam\Storefront\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['storefront'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../../../../config/config.php' => config_path('package/storefront.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../../../../resources/views' => base_path('resources/views/vendor/storefront')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../../../../resources/lang' => base_path('resources/lang/vendor/storefront')], 'lang');

        // Publish migrations
        $this->publishes([__DIR__ . '/../../../../database/migrations/' => base_path('database/migrations')], 'migrations');

        // Publish seeds
        $this->publishes([__DIR__ . '/../../../../database/seeds/' => base_path('database/seeds')], 'seeds');
    }
}
