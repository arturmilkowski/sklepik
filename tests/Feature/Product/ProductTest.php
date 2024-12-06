<?php

namespace Tests\Feature\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product\{Brand, Category, Concentration, Product};

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /*
    public function testProductIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertViewIs('product.index');
        $response->assertSeeText('Produkty');
    }
    */

    public function testProductShow(): void
    {
        $this->withoutExceptionHandling();
        $product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $response = $this->get(route('products.show', $product));

        $response->assertStatus(200);
        $response->assertViewIs('product.show');
        $response->assertSeeText($product->name);
    }
}
