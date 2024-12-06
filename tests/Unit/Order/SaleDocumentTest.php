<?php

namespace Tests\Unit\Order;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Order\SaleDocument;
use App\Models\Order\{Status, Order};
use App\Models\User;

class SaleDocumentTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeSaleDocument(): void
    {
        $saleDocument = SaleDocument::factory()->make();

        $this->assertInstanceOf(SaleDocument::class, $saleDocument);
    }

    public function testCreateSaleDocument(): void
    {
        $saleDocument = SaleDocument::factory()->create();

        $this->assertModelExists($saleDocument);
        $this->assertDatabaseHas('sale_documents', [
            'slug' => $saleDocument->slug,
            'name' => $saleDocument->name,
            'description' => $saleDocument->description,
        ]);
    }

    public function testSaleDocumentHasManyOrders(): void
    {
        $saleDocument = SaleDocument::factory()
            ->has(
                Order::factory()
                    ->for(User::factory(), 'orderable')
                    ->for(Status::factory())
                    ->for(SaleDocument::factory())
            )
            ->create();

        $this->assertInstanceOf(Collection::class, $saleDocument->orders);
    }
}
