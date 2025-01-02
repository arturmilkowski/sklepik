<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\{Brand, Category, Concentration, Product, Size, Type};

class DashboardTest extends TestCase
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

    public function testIndex(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.dashboard');
    }

    public function testIndexWithCart(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        // add product to a basket
        $response = $this->post(route('cart.store', [$this->type]));
        $response = $this->actingAs($user);
        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.dashboard');
        // $response->assertSeeText('Przejdź do kasy');
    }
}
