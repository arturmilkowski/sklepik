<?php

namespace Tests\Unit\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Order\{SaleDocument, Status, Order, Item};
use App\Models\Customer\Customer;
use App\Models\User;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeOrder(): void
    {
        $order = Order::factory()->make();

        $this->assertInstanceOf(Order::class, $order);
    }

    public function testCreateOrder(): void
    {
        $status = Status::factory()->create();
        $saleDocument = SaleDocument::factory()->create();

        $order = Order::factory()
            ->for($status)
            ->for($saleDocument)
            // ->for(Customer::factory(), 'orderable')
            ->create();

        $this->assertDatabaseHas('orders', [
            // 'orderable_type' => 'App\Models\Customer\Customer',
            // 'status_id' => $order->status->id,
            // 'sale_document_id' => $saleDocument->id,
            'total_price' => $order->total_price,
            'delivery_cost' => $order->delivery_cost,
            'total_price_and_delivery_cost' => $order->total_price_and_delivery_cost,
            'delivery_name' => $order->delivery_name,
            'comment' => $order->comment,
        ]);

        $order = Order::factory()
            // >for($status)
            // ->for($saleDocument)
            // ->for(User::factory(), 'orderable')
            ->create();

        $this->assertModelExists($order);

        /*
        $this->assertDatabaseHas('orders', [
            'orderable_type' => 'App\Models\User',
        ]);
        */
    }

    /*
    public function testOrderBelongsToStatus(): void
    {
        $order = Order::factory()
            ->for(Status::factory())
            ->for(SaleDocument::factory())
            ->for(Customer::factory(), 'orderable')
            ->create();

        $this->assertInstanceOf(Status::class, $order->status);
    }

    public function testOrderBelongsToSaleDocument(): void
    {
        $order = Order::factory()
            ->for(Status::factory())
            ->for(SaleDocument::factory())
            ->for(Customer::factory(), 'orderable')
            ->create();

        $this->assertInstanceOf(SaleDocument::class, $order->saleDocument);
    }

    public function testOrderHasManyItems(): void
    {
        $order = Order::factory()
            ->for(Status::factory())
            ->for(SaleDocument::factory())
            ->for(Customer::factory(), 'orderable')
            ->has(Item::factory())
            ->create();

        $this->assertInstanceOf(Collection::class, $order->items);
    }
    */
}
