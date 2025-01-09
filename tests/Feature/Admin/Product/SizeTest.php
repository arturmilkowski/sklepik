<?php

namespace Tests\Feature\Admin\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\Size;

class SizeTest extends TestCase
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
        $response = $this->get(route('backend.admins.products.sizes.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.size.index');
        $response->assertSeeText('Pojemności');
    }

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.sizes.create'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.size.create');
        $response->assertSeeText('Dodawanie');
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        $item = Size::factory()->make();
        $response = $this->post(route('backend.admins.products.sizes.store', $item->toArray()));
        $response->assertStatus(302);
        $this->assertDatabaseHas('sizes', ['name' => $item->name]);
    }

    public function testStoreWithValidationError(): void
    {
        $item = Size::factory()->make(['name' => '']);
        $response = $this->post(route('backend.admins.products.sizes.store', $item->toArray()));
        $response->assertStatus(302);
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('sizes', ['name' => $item->name]);
    }

    public function testStoreWithDuplicateValidationError(): void
    {
        $item = size::factory()->make();
        $response = $this->post(route('backend.admins.products.sizes.store', $item->toArray()));
        $response = $this->post(route('backend.admins.products.sizes.store', $item->toArray()));
        $response->assertInvalid(['name' => 'The name has already been taken.']);
    }


    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $item = Size::factory()->create();
        $response = $this->get(route('backend.admins.products.sizes.show', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.size.show');
        $response->assertSeeText('Pojemność');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $item = Size::factory()->create();
        $response = $this->get(route('backend.admins.products.sizes.edit', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.size.edit');
        $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $item = Size::factory()->create();
        $item1 = Size::factory()->make();
        $response = $this->put(route('backend.admins.products.sizes.update', $item), $item1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('sizes', ['name' => $item1->name]);
    }

    public function testUpdateWithValidationError(): void
    {
        $item = Size::factory()->create();
        $item1 = Size::factory()->make(['name' => '']);
        $response = $this->put(route('backend.admins.products.sizes.update', $item), $item1->toArray());
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('sizes', ['name' => $item1->name]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $item = Size::factory()->create();
        $response = $this->delete(route('backend.admins.products.sizes.destroy', $item));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('sizes', ['name' => $item->name]);
    }
}
