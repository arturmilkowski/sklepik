<?php

namespace Tests\Unit\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Collection;
use App\Models\Product\{Brand, Category, Concentration, Product};

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

    public function testBrandHasManyProducts(): void
    {
        $brand = Brand::factory()
            ->has(
                Product::factory()
                    ->for(Category::factory())
                    ->for(Concentration::factory())
                    ->for(Brand::factory())
            )
            ->create();

        $this->assertInstanceOf(Collection::class, $brand->products);
    }
}
