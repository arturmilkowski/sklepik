<?php

namespace Tests\Feature\Order;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\{Brand, Category, Concentration, Product, Size, Type};

class WithoutRegistrationTest extends TestCase
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

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user);

        // add product to a basket
        $response = $this->post(route('cart.store', [$this->type]));
        $response = $this->get(route('orders.without-registration.create'));

        $response->assertOk();
        $response->assertViewIs('order.without-registration');
        $response->assertSeeText('Zamówienie bez rejestracji');
    }

    public function testCreateWithoutBasket(): void
    {
        $this->withoutExceptionHandling();

        // without basket
        $response = $this->get(route('orders.without-registration.create'));

        $response->assertStatus(302);
        $response->assertRedirect(route('pages.index'));
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->post(route('orders.without-registration.store', [
            'name' => 'Artur',
            'surname' => 'Miłkowski',
            'street' => 'Bałandy 4B/8',
            'zip_code' => '32-600',
            'city' => 'Oświęcim',
            'voivodeship_id' => 1,
            'email' => 'artur@gmail.com',
            'term' => true,
        ]));
        // $response->dumpHeaders();
        // $response->dumpSession();
        // $response->dump();

        /*
        $delivery = factory(Delivery::class)->create();
        $method = factory(Method::class)->create(['delivery_id' => $delivery->id]);
        factory(Cost::class)->create(['method_id' => $method->id]);

        // add product to a basket
        $response = $this->post(route('frontend.basket.store', [$this->typeID]));
        $response->assertStatus(302);
        // cache
        $response = $this->get(route('frontend.orders.cash.index'));
        $response->assertOk();
        // create form page
        $response = $this->get(route('frontend.orders.cash.index'));
        $response->assertOk('frontend.orders.without_registration.create');

        $customer = factory(Customer::class)->make();

        $response = $this->post(
            route(
                'frontend.orders.without_registration.store',
                $customer->getAttributes(),
                ['sale_document_id' => 3]
            )
        );
        $response->assertStatus(302);
        */
    }
}
