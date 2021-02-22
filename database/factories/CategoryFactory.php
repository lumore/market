<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company
        ];
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @param int $count
     * @return $this
     */
    public function withChildren($count = 1): CategoryFactory
    {
        return $this->has(
            Category::factory()
                ->count($count)
                ->state(function (array $attributes, Category $category) {
                    return [
                        'name' => $this->faker->company,
                        'parent_id' => $category->id,
                    ];
                }),
            'children'
        );
    }
}
