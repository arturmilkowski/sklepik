<?php

namespace Tests\Unit\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Product\{Brand, Category, Concentration, Product, Size, Type};

class SizeTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeSize(): void
    {
        $size = Size::factory()->make();

        $this->assertInstanceOf(Size::class, $size);
    }

    public function testCreateSize(): void
    {
        $size = Size::factory()->create();

        $this->assertModelExists($size);
        $this->assertDatabaseHas('sizes', [
            'slug' => $size->slug,
            'name' => $size->name,
        ]);
    }

    public function testSizeHasManyTypes(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();

        $size = Size::factory()
            ->has(
                Type::factory()->for($product)
            )
            ->create();
        $types = $size->types;

        $this->assertInstanceOf(Collection::class, $types);
    }
}
