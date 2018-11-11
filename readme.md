This is a Laravel 5 package that provides storefront management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `xetam/storefront`.

    "xetam/storefront": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Xetam\Storefront\Providers\StorefrontServiceProvider::class,

```

And also add it to alias

```php
'Storefront'  => Xetam\Storefront\Facades\Storefront::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Xetam\Storefront\Providers\StorefrontServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Xetam\Storefront\Providers\StorefrontServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Xetam\Storefront\Providers\StorefrontServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Xetam\Storefront\Providers\StorefrontServiceProvider" --tag="lang"

Views public and admin

    php artisan vendor:publish --provider="Xetam\Storefront\Providers\StorefrontServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Xetam\Storefront\Providers\StorefrontServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


