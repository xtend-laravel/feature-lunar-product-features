<?php

use Illuminate\Support\Facades\Route;
use Lunar\Hub\Http\Middleware\Authenticate;
use XtendLunar\Features\ProductFeatures\Livewire\Pages\FeaturesIndex;

/**
 * Product features routes.
 */
Route::group([
    'prefix' => config('lunar-hub.system.path', 'hub'),
    'middleware' => ['web', Authenticate::class, 'can:settings:core'],
], function () {
    Route::get('product-features', FeaturesIndex::class)->name('hub.product-features.index');
});
