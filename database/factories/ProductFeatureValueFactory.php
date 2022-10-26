<?php

namespace XtendLunar\Features\ProductFeatures\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use XtendLunar\Features\ProductFeatures\Models\ProductFeatureValue;

class ProductFeatureValueFactory extends Factory
{
    private static $position = 1;

    protected $model = ProductFeatureValue::class;

    public function definition(): array
    {
        return [
            'name' => [
                'en' => $this->faker->name,
            ],
            'position' => self::$position++,
        ];
    }
}
