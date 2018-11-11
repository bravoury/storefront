<?php

namespace Xetam\Storefront\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Xetam\Storefront\Models\Product;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view the product.
     *
     * @param User $user
     * @param Product $product
     *
     * @return bool
     */
    public function view(User $user, Product $product)
    {
        if ($user->canDo('storefront.product.view') && $user->is('admin')) {
            return true;
        }

        return $user->id === $product->user_id;
    }

    /**
     * Determine if the given user can create a product.
     *
     * @param User $user
     * @param Product $product
     *
     * @return bool
     */
    public function create(User $user)
    {
        return  $user->canDo('storefront.product.create');
    }

    /**
     * Determine if the given user can update the given product.
     *
     * @param User $user
     * @param Product $product
     *
     * @return bool
     */
    public function update(User $user, Product $product)
    {
        if ($user->canDo('storefront.product.update') && $user->is('admin')) {
            return true;
        }

        return $user->id === $product->user_id;
    }

    /**
     * Determine if the given user can delete the given product.
     *
     * @param User $user
     * @param Product $product
     *
     * @return bool
     */
    public function destroy(User $user, Product $product)
    {
        if ($user->canDo('storefront.product.delete') && $user->is('admin')) {
            return true;
        }

        return $user->id === $product->user_id;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperUser()) {
            return true;
        }
    }
}
