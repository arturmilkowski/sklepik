<?php

namespace Tests\Unit\Product;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Product\{Brand, Category, Concentration, Product};

class ConcentrationTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeConcentration(): void
    {
        $concentration = Concentration::factory()->make();

        $this->assertInstanceOf(Concentration::class, $concentration);
    }

    public function testCreateConcentration(): void
    {
        $concentration = Concentration::factory()->create();

        $this->assertModelExists($concentration);
        $this->assertDatabaseHas('concentrations', [
            'slug' => $concentration->slug,
            'name' => $concentration->name,
        ]);
    }

    public function testConcentrationHasManyProducts(): void
    {
        $concentration = Concentration::factory()
            ->has(
                Product::factory()
                    ->for(Brand::factory())
                    ->for(Category::factory())
                    ->for(Concentration::factory())
            )
            ->create();
        $products = $concentration->products;

        $this->assertInstanceOf(Collection::class, $products);
    }
}
