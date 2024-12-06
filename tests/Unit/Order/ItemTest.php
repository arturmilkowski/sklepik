<?php

namespace Tests\Unit\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order\{Status, Item, Order};
use App\Models\Customer\Customer;
use App\Models\Order\SaleDocument;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeOrderItem()
    {
        $item = Item::factory()->make();

        $this->assertInstanceOf(Item::class, $item);
    }

    public function testCreateOrderItem()
    {
        $order = Order::factory()
            ->for(Status::factory())
            ->for(SaleDocument::factory())
            ->for(Customer::factory(), 'orderable')
            ->create();
        $item = Item::factory()->for($order)->create();

        $this->assertModelExists($item);
        $this->assertDatabaseHas('items', [
            'order_id' => $order->id,
            'type_id' => $item->type_id,
            'type_name' => $item->type_name,
            'name' => $item->name,
            'concentration' => $item->concentration,
            'category' => $item->category,
            'price' => $item->price,
            'quantity' => $item->quantity,
            'subtotal_price' => $item->subtotal_price,
        ]);
    }

    public function testItemBelongsToOrder()
    {
        $item = Item::factory()
            ->for(
                Order::factory()
                    ->for(Status::factory())
                    ->for(SaleDocument::factory())
                    ->for(Customer::factory(), 'orderable')
            )
            ->create();

        $this->assertInstanceOf(Order::class, $item->order);
    }
}
