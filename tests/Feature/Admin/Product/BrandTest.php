<?php

namespace Tests\Feature\Admin\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\{Brand};

class BrandTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function testIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.brands.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.brand.index');
        $response->assertSeeText('Firmy');
    }

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.brands.create'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.brand.create');
        $response->assertSeeText('Dodawanie');
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        $brand = Brand::factory()->make();
        $response = $this->post(route('backend.admins.products.brands.store', $brand->toArray()));
        $response->assertStatus(302);
        $this->assertDatabaseHas('brands', ['name' => $brand->name]);
    }

    public function testStoreWithValidationError(): void
    {
        $brand = Brand::factory()->make(['name' => '']);
        $response = $this->post(route('backend.admins.products.brands.store', $brand->toArray()));
        $response->assertStatus(302);
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('brands', ['name' => $brand->name]);
    }

    public function testStoreWithValidationError1(): void
    {
        $brand = Brand::factory()->make();
        $response = $this->post(route('backend.admins.products.brands.store', $brand->toArray()));
        $response = $this->post(route('backend.admins.products.brands.store', $brand->toArray()));
        $response->assertInvalid(['name' => 'The name has already been taken.']);
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $brand = Brand::factory()->create();
        $response = $this->get(route('backend.admins.products.brands.show', $brand));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.brand.show');
        $response->assertSeeText('Firma');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $brand = Brand::factory()->create();
        $response = $this->get(route('backend.admins.products.brands.edit', $brand));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.brand.edit');
        $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $brand = Brand::factory()->create();
        $brand1 = Brand::factory()->make();
        $response = $this->put(route('backend.admins.products.brands.update', $brand), $brand1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('brands', ['name' => $brand1->name]);
    }

    public function testUpdateWithValidationError(): void
    {
        $brand = Brand::factory()->create();
        $brand1 = Brand::factory()->make(['name' => '']);
        $response = $this->put(route('backend.admins.products.brands.update', $brand), $brand1->toArray());
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('brands', ['name' => $brand1->name]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $brand = Brand::factory()->create();
        $response = $this->delete(route('backend.admins.products.brands.destroy', $brand));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('brands', ['name' => $brand->name]);
    }
}
