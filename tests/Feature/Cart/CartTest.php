<?php

namespace Tests\Feature\Cart;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product\{Brand, Category, Concentration, Product, Size, Type};

class CartTest extends TestCase
{
    use RefreshDatabase;

    protected $type;

    public function setUp(): void
    {
        parent::setUp();

        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $this->type = Type::factory()
            ->for($product)
            ->for(Size::factory())
            ->create();
    }

    public function testCartStore(): void
    {
        $response = $this->post(route('cart.store', $this->type));

        $response->assertStatus(302);
    }

    public function testCartDestroy(): void
    {
        $response = $this->delete(route('cart.destroy', $this->type));

        $response->assertStatus(302);
    }

    public function testCartDestroyAll(): void
    {
        $response = $this->get(route('cart.destroy.all', $this->type));

        $response->assertStatus(302);
    }
}
