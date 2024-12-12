<?php

namespace Tests\Feature\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product\{Brand, Category, Concentration, Product, Size, Type};

class CheckoutTest extends TestCase
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

    public function testIndex()
    {
        $this->withoutExceptionHandling();

        // add product to cart
        $response = $this->post(route('cart.store', $this->type));
        $response = $this->get(route('orders.checkout.index'));

        $response->assertStatus(200);
        $response->assertViewIs('order.checkout.index');
        $response->assertSeeText('Kasa');
        $response->assertSeeText($this->type->name);
    }
}
