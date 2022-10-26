<?php

namespace XtendLunar\Features\ProductFeatures\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use XtendLunar\Features\ProductFeatures\Models\ProductFeature;

class ProductFeatureFactory extends Factory
{
    private static $position = 1;

    protected $model = ProductFeature::class;

    public function definition(): array
    {
        $name = $this->faker->name;

        return [
            'handle' => Str::slug($name),
            'name' => [
                'en' => $name,
            ],
            'position' => self::$position++,
        ];
    }
}
