<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Order\{SaleDocument, Status, Order, Item};

class OrderTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function testIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.orders.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.order.index');
        $response->assertSeeText('Zamówienia');
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $status = Status::factory()->create();
        $saleDocument = SaleDocument::factory()->create();
        $user = User::factory()->create();
        $order = Order::factory()
            ->for($status)
            ->for($saleDocument)
            ->for($user, 'orderable')
            ->create();
        $response = $this->get(route('backend.admins.orders.show', $order));
        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.order.show');
        $response->assertSeeText('Zamówienie');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $status = Status::factory()->create();
        $saleDocument = SaleDocument::factory()->create();
        $user = User::factory()->create();
        $order = Order::factory()
            ->for($status)
            ->for($saleDocument)
            ->for($user, 'orderable')
            ->create();
        $response = $this->get(route('backend.admins.orders.edit', $order));
        $response->assertStatus(200);
        $response->assertViewIs('backend.admin.order.edit');
        $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $status = Status::factory()->create();
        $status1 = Status::factory()->create();
        $saleDocument = SaleDocument::factory()->create();
        $user = User::factory()->create();
        $order = Order::factory()
            ->for($status)
            ->for($saleDocument)
            ->for($user, 'orderable')
            ->create();
        $order1 = Order::factory()
            ->for($status)
            ->for($saleDocument)
            ->for($user, 'orderable')
            ->make();
        $response = $this->patch(route('backend.admins.orders.update', $order), $order1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('orders', ['status_id' => $status->id]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $status = Status::factory()->create();
        $saleDocument = SaleDocument::factory()->create();
        $user = User::factory()->create();
        $order = Order::factory()
            ->for($status)
            ->for($saleDocument)
            ->for($user, 'orderable')
            ->create();
        $response = $this->delete(route('backend.admins.orders.destroy', $order));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
    }
}
