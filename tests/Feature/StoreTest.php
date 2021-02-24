<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_can_be_created()
    {
        Store::factory()->create();

        $this->assertCount(1, Store::all()->toArray());
    }

    public function test_it_can_have_products()
    {
        $store = Store::factory()->create();

        Product::factory()
            ->count(1)
            ->for($store)
            ->hasCategory(1)
            ->create();

        $this->assertCount(1, $store->products->toArray());
    }
}
