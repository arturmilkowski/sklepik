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
}
