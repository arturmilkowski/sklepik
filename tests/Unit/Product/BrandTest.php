<?php

namespace Tests\Unit\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product\Brand;

class BrandTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeProduct(): void
    {
        $brand = Brand::factory()->make();

        $this->assertInstanceOf(Brand::class, $brand);
    }

    public function testCreateBrand(): void
    {
        $brand = Brand::factory()->create();

        $this->assertModelExists($brand);
        $this->assertDatabaseHas('brands', [
            'slug' => $brand->slug,
            'name' => $brand->name,
        ]);
    }
}
