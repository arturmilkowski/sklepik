<?php

namespace Tests\Unit\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product\Category;

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
}
