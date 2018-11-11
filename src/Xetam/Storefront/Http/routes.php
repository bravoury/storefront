<?php

// Admin web routes  for product
Route::group(['prefix' => trans_setlocale().'/admin/storefront'], function () {
    Route::resource('product', 'Xetam\Storefront\Http\Controllers\ProductAdminWebController');
});

// Admin API routes  for product
Route::group(['prefix' => trans_setlocale().'api/v1/admin/storefront'], function () {
    Route::resource('product', 'Xetam\Storefront\Http\Controllers\ProductAdminApiController');
});

// User web routes for product
Route::group(['prefix' => trans_setlocale().'/user/storefront'], function () {
    Route::resource('product', 'Xetam\Storefront\Http\Controllers\ProductUserWebController');
});

// User API routes for product
Route::group(['prefix' => trans_setlocale().'api/v1/user/storefront'], function () {
    Route::resource('product', 'Xetam\Storefront\Http\Controllers\ProductUserApiController');
});

// Public web routes for product
Route::group(['prefix' => trans_setlocale().'/storefronts'], function () {
    Route::get('/', 'Xetam\Storefront\Http\Controllers\ProductPublicWebController@index');
    Route::get('/{slug?}', 'Xetam\Storefront\Http\Controllers\ProductPublicWebController@show');
});

// Public API routes for product
Route::group(['prefix' => trans_setlocale().'api/v1/storefronts'], function () {
    Route::get('/', 'Xetam\Storefront\Http\Controllers\ProductPublicApiController@index');
    Route::get('/{slug?}', 'Xetam\Storefront\Http\Controllers\ProductPublicApiController@show');
});


// Admin web routes  for product
Route::group(['prefix' => trans_setlocale().'/admin/storefront'], function () {
    Route::resource('product', 'Xetam\Storefront\Http\Controllers\ProductAdminWebController');
});

// Admin API routes  for product
Route::group(['prefix' => trans_setlocale().'api/v1/admin/storefront'], function () {
    Route::resource('product', 'Xetam\Storefront\Http\Controllers\ProductAdminApiController');
});

// User web routes for product
Route::group(['prefix' => trans_setlocale().'/user/storefront'], function () {
    Route::resource('product', 'Xetam\Storefront\Http\Controllers\ProductUserWebController');
});

// User API routes for product
Route::group(['prefix' => trans_setlocale().'api/v1/user/storefront'], function () {
    Route::resource('product', 'Xetam\Storefront\Http\Controllers\ProductUserApiController');
});

// Public web routes for product
Route::group(['prefix' => trans_setlocale().'/storefronts'], function () {
    Route::get('/', 'Xetam\Storefront\Http\Controllers\ProductPublicWebController@index');
    Route::get('/{slug?}', 'Xetam\Storefront\Http\Controllers\ProductPublicWebController@show');
});

// Public API routes for product
Route::group(['prefix' => trans_setlocale().'api/v1/storefronts'], function () {
    Route::get('/', 'Xetam\Storefront\Http\Controllers\ProductPublicApiController@index');
    Route::get('/{slug?}', 'Xetam\Storefront\Http\Controllers\ProductPublicApiController@show');
});

