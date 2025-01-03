<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order\{Status, Order, Item};
use App\Models\Geo\Voivodeship;
use App\Models\Order\SaleDocument;
use App\Models\Customer\Customer;

class CustomerOrderTest extends TestCase
{
    use RefreshDatabase;

    private $customer;
    private $order;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
        $voivodeship = Voivodeship::factory()->create();
        $this->customer = Customer::factory()->for($voivodeship)->create();
        $status = Status::factory()->create();
        $saleDocument = SaleDocument::factory()->create();
        $this->order = Order::factory()
            ->for($status)
            ->for($saleDocument)
            ->for($this->customer, 'orderable')
            ->create();
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.customers.orders.edit', $this->customer));
        $response->assertOk();
        $response->assertViewIs('backend.admin.customer.order.edit');
        $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $status = Status::factory()->create();
        $order1 = Order::factory()->for($status)->make();
        $response = $this->put(route('backend.admins.customers.orders.update', $this->customer), $order1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('orders', ['status_id' => $order1->status_id]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->delete(route('backend.admins.customers.destroy', $this->customer));
        $response->assertStatus(302);
        // dd($response);
        $this->assertDatabaseMissing('orders', ['id' => $this->order->id]);
    }
}
