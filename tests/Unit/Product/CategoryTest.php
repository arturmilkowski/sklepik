<?php

namespace Tests\Unit\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Collection;
use App\Models\Product\{Brand, Category, Concentration, Product};

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeCategory(): void
    {
        $category = Category::factory()->make();

        $this->assertInstanceOf(Category::class, $category);
    }

    public function testCreateCategory(): void
    {
        $category = Category::factory()->create();

        $this->assertModelExists($category);
        $this->assertDatabaseHas('categories', [
            'slug' => $category->slug,
            'name' => $category->name,
        ]);
    }

    public function testCategoryHasManyProducts(): void
    {
        $category = Category::factory()
            ->has(
                Product::factory()
                    ->for(Brand::factory())
                    ->for(Category::factory())
                    ->for(Concentration::factory())
            )
            ->create();
        $products = $category->products;

        $this->assertInstanceOf(Collection::class, $products);
    }
}
