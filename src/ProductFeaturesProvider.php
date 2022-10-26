<?php

namespace XtendLunar\Features\ProductFeatures;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Lunar\Hub\Facades\Slot;
use XtendLunar\Features\ProductFeatures\Livewire\Components\ProductFeatureEdit;
use XtendLunar\Features\ProductFeatures\Livewire\Components\ProductFeatureValueEdit;
use XtendLunar\Features\ProductFeatures\Livewire\Pages\FeaturesIndex;
use XtendLunar\Features\ProductFeatures\Livewire\Slots\ProductFeatureSlot;

class ProductFeaturesProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/hub.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminhub');

        Livewire::component('hub.pages.product-features.index', FeaturesIndex::class);
        Livewire::component('hub.components.product-features.edit', ProductFeatureEdit::class);
        Livewire::component('hub.components.product-features.value-edit', ProductFeatureValueEdit::class);
        Livewire::component('hub.components.products.slots.product-feature-slot', ProductFeatureSlot::class);

        Slot::register('product.show', ProductFeatureSlot::class);
    }
}
