<?php

namespace Tests\Unit\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product\{Brand, Category, Concentration, Product, Size, Type};

class TypeTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeType(): void
    {
        $type = Type::factory()->make();

        $this->assertInstanceOf(Type::class, $type);
    }

    public function testCreateType(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $type = Type::factory()
            ->for($product)
            ->for(Size::factory())
            ->create();

        $this->assertModelExists($type);
        $this->assertDatabaseHas('types', [
            'product_id' => $type->product_id,
            'size_id' => $type->size_id,
            'slug' => $type->slug,
            'name' => $type->name,
            'price' => $type->price,
            'promo_price' => $type->promo_price,
            'quantity' => $type->quantity,
            'description' => $type->description,
            'hide' => $type->hide,
        ]);
    }

    public function testTypeBelongsToProduct(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $type = Type::factory()
            ->for($product)
            ->for(Size::factory())
            ->create();
        $product = $type->product;

        $this->assertInstanceOf(Product::class, $product);
    }

    public function testTypeBelongsToSize(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $size = Size::factory()->create();
        $type = Type::factory()
            ->for($product)
            ->for($size)
            ->create();

        $this->assertInstanceOf(Size::class, $type->size);
    }
}
