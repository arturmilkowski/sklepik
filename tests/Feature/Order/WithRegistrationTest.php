<?php

namespace Tests\Feature\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\{Brand, Category, Concentration, Product, Size, Type};

class WithRegistrationTest extends TestCase
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

    /**
     * A basic feature test example.
     */
    public function testCreate(): void
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $response = $this->actingAs($user);
        // add product to a basket
        $response = $this->post(route('cart.store', [$this->type]));
        $response = $this->get(route('orders.with-registration.create'));

        $response->assertStatus(200);
    }
}
