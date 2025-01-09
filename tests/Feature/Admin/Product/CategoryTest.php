<?php

namespace Tests\Feature\Admin\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\Category;

class CategoryTest extends TestCase
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
        $response = $this->get(route('backend.admins.products.categories.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.category.index');
        $response->assertSeeText('Kategorie');
    }

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.categories.create'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.category.create');
        $response->assertSeeText('Dodawanie');
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        $item = Category::factory()->make();
        $response = $this->post(route('backend.admins.products.categories.store', $item->toArray()));
        $response->assertStatus(302);
        $this->assertDatabaseHas('categories', ['name' => $item->name]);
    }

    public function testStoreWithValidationError(): void
    {
        $item = Category::factory()->make(['name' => '']);
        $response = $this->post(route('backend.admins.products.categories.store', $item->toArray()));
        $response->assertStatus(302);
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('categories', ['name' => $item->name]);
    }

    public function testStoreWithValidationError1(): void
    {
        $item = Category::factory()->make();
        $response = $this->post(route('backend.admins.products.categories.store', $item->toArray()));
        $response = $this->post(route('backend.admins.products.categories.store', $item->toArray()));
        $response->assertInvalid(['name' => 'The name has already been taken.']);
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $item = Category::factory()->create();
        $response = $this->get(route('backend.admins.products.categories.show', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.category.show');
        $response->assertSeeText('Kategoria');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $item = Category::factory()->create();
        $response = $this->get(route('backend.admins.products.categories.edit', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.category.edit');
        $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $item = Category::factory()->create();
        $item1 = Category::factory()->make();
        $response = $this->put(route('backend.admins.products.categories.update', $item), $item1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('categories', ['name' => $item1->name]);
    }

    public function testUpdateWithValidationError(): void
    {
        $item = Category::factory()->create();
        $item1 = Category::factory()->make(['name' => '']);
        $response = $this->put(route('backend.admins.products.categories.update', $item), $item1->toArray());
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('brands', ['name' => $item1->name]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $item = Category::factory()->create();
        $response = $this->delete(route('backend.admins.products.categories.destroy', $item));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('categories', ['name' => $item->name]);
    }
}
