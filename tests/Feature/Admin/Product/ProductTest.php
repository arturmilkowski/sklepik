<?php

namespace Tests\Feature\Admin\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\{Brand, Category, Concentration, Product};

class ProductTest extends TestCase
{
    use RefreshDatabase;

    private $product;
    private $brand;
    private $category;
    private $concentration;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
        $this->brand = Brand::factory()->create();
        $this->category = Category::factory()->create();
        $this->concentration = Concentration::factory()->create();
        $this->product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
    }

    public function testIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.products.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.index');
        $response->assertSeeText('Produkty');
    }

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.products.create'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.create');
        $response->assertSeeText('Dodawanie');
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        $item = Product::factory()
            ->for($this->brand)
            ->for($this->category)
            ->for($this->concentration)
            ->make();
        $response = $this->post(route('backend.admins.products.products.store', $item->toArray()));
        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['name' => $item->name]);
    }

    public function testStoreWithValidationError(): void
    {
        $item = Product::factory()->make(['name' => '']);
        $response = $this->post(route('backend.admins.products.products.store', $item->toArray()));
        $response->assertStatus(302);
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('products', ['name' => $item->name]);
    }

    public function testStoreWithDuplicateValidationError(): void
    {
        $item = Product::factory()
            ->for($this->brand)
            ->for($this->category)
            ->for($this->concentration)
            ->make();
        $response = $this->post(route('backend.admins.products.products.store', $item->toArray()));
        $response = $this->post(route('backend.admins.products.products.store', $item->toArray()));
        $response->assertInvalid(['name' => 'The name has already been taken.']);
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->product;
        $response = $this->get(route('backend.admins.products.products.show', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.show');
        $response->assertSeeText('Produkt');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->product;
        $response = $this->get(route('backend.admins.products.products.edit', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.edit');
        $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->product;
        $item1 = Product::factory()->make();
        $response = $this->put(route('backend.admins.products.products.update', $item), $item1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['name' => $item1->name]);
    }

    public function testUpdateWithValidationError(): void
    {
        $item = $this->product;
        $item1 = Product::factory()->make(['name' => '']);
        $response = $this->put(route('backend.admins.products.products.update', $item), $item1->toArray());
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('products', ['name' => $item1->name]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->product;
        $response = $this->delete(route('backend.admins.products.products.destroy', $item));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('products', ['name' => $item->name]);
    }
}
