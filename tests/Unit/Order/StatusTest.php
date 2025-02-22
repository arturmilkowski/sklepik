<?php

namespace Tests\Unit\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Order\{Status, SaleDocument, Order};
use App\Models\User;

// use App\Models\Customer\Customer;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeOrderStatus(): void
    {
        $status = Status::factory()->make();

        $this->assertInstanceOf(Status::class, $status);
    }


    public function testCreateOrderStatus(): void
    {
        $status = Status::factory()->create();

        $this->assertModelExists($status);
        $this->assertDatabaseHas('statuses', [
            'slug' => $status->slug,
            'name' => $status->name,
            'description' => $status->description,
        ]);
    }

    public function testStatusHasManyOrders(): void
    {
        $status = Status::factory()
            ->has(
                Order::factory()
                ->for(Status::factory())
                ->for(SaleDocument::factory())
                ->for(User::factory(), 'orderable')
            )
            ->create();

        $this->assertInstanceOf(Collection::class, $status->orders);
    }
}
