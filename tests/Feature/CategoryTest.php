<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_can_be_created()
    {
        Category::factory()->create();

        $this->assertCount(1, Category::all()->toArray());
    }

    public function test_does_not_generate_duplicate_slugs()
    {
        $payload = [
            'name' => 'Test Category'
        ];

        $firstCategory = Category::create($payload);
        $secondCategory = Category::create($payload);

        $this->assertFalse($firstCategory->slug === $secondCategory->slug);
    }

    public function test_it_can_have_children()
    {
        $category = Category::factory()->withChildren(10)->create();

        $this->assertCount(10, $category->children->toArray());
    }
}
