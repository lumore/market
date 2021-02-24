<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

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
     * @return array
     */
    public function definition(): array
    {
        return [
            'store_id' => Store::factory(),
            'category_id' => Store::factory(),
            'name' => $this->faker->company,
            'description' => $this->faker->realText(),
            'price' => $this->faker->numberBetween(100, 1000),
            'quantity' => $this->faker->numberBetween(10, 100),
            'status' => new Sequence(Product::STATUS_PUBLISHED, Product::STATUS_DRAFT)
        ];
    }
}
