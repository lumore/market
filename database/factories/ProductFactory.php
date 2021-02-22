<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * TODO: [FIX] Generates too many entities of related factories
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'store_id' => Store::factory(),
            'category_id' => Category::factory(),
            'name' => $this->faker->word(),
            'description' => $this->faker->realText(),
            'price' => $this->faker->numberBetween(100, 1000),
            'quantity' => $this->faker->numberBetween(0, 100),
            'status' => $this->sequence([Product::STATUS_DRAFT, Product::STATUS_PUBLISHED]),
        ];
    }
}
