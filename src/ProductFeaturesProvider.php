<?php

namespace XtendLunar\Features\ProductFeatures;

use CodeLabX\XtendLaravel\Base\XtendFeatureProvider;
use Illuminate\Foundation\Events\LocaleUpdated;
use Illuminate\Support\Facades\Event;
use Livewire\Livewire;
use Lunar\Hub\Facades\Menu;
use Lunar\Hub\Facades\Slot;
use XtendLunar\Features\ProductFeatures\Livewire\Components\ProductFeatureEdit;
use XtendLunar\Features\ProductFeatures\Livewire\Components\ProductFeatureValueEdit;
use XtendLunar\Features\ProductFeatures\Livewire\Pages\FeaturesIndex;
use XtendLunar\Features\ProductFeatures\Livewire\Slots\ProductFeatureSlot;

class ProductFeaturesProvider extends XtendFeatureProvider
{
    public function register(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/hub.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminhub');
	    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function boot(): void
    {
        Livewire::component('hub.pages.product-features.index', FeaturesIndex::class);
        Livewire::component('hub.components.product-features.edit', ProductFeatureEdit::class);
        Livewire::component('hub.components.product-features.value-edit', ProductFeatureValueEdit::class);
        Livewire::component('hub.components.products.slots.product-feature-slot', ProductFeatureSlot::class);

        Slot::register('product.show', ProductFeatureSlot::class);

        // @todo Move this to XtendFeatureProvider to check if method exists

        $this->registerWithSidebarMenu();
    }

    protected function registerWithSidebarMenu(): void
    {
        // Note: We listen to LocaleUpdated event to make sure translations are loaded and menu items are all available
        Event::listen(LocaleUpdated::class, function () {
            Menu::slot('sidebar')->group('hub.configure')->addItem(function ($item) {
                $item->name('Product Features')
                     ->handle('hub.product-features')
                     ->route('hub.product-features.index')
                     ->gate('settings:core')
                     ->icon('clipboard-list');
            }, 'hub.products');
        });
    }
}
