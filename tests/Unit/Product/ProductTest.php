<?php

namespace Tests\Unit\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Product\{Brand, Category, Concentration, Size, Product, Type};

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeProduct(): void
    {
        $product = Product::factory()->make();

        $this->assertInstanceOf(Product::class, $product);
    }

    public function testCreateProduct(): void
    {
        $brand = Brand::factory()->create();
        $category = Category::factory()->create();
        $concentration = Concentration::factory()->create();

        $product = Product::factory()
            ->for($brand)
            ->for($category)
            ->for($concentration)
            ->create();

        $this->assertModelExists($product);
        $this->assertDatabaseHas('products', [
            'brand_id' => $brand->id,
            'category_id' => $category->id,
            'concentration_id' => $concentration->id,
            'slug' => $product->slug,
            'name' => $product->name,
            'description' => $product->description,
            'img' => $product->img,
            'site_description' => $product->site_description,
            'site_keyword' => $product->site_keyword,
            'hide' => $product->hide,
        ]);
    }
    
    public function testProductBelongsToBrand(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $brand = $product->brand;

        $this->assertInstanceOf(Brand::class, $brand);
    }

    public function testProductBelongsToCategory(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $category = $product->category;

        $this->assertInstanceOf(Category::class, $category);
    }

    public function testProductBelongsToConcentration(): void
    {
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $concentration = $product->concentration;

        $this->assertInstanceOf(Concentration::class, $concentration);
    }
}
