<?php

namespace Tests\Feature\Admin\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\Concentration;

class ConcentrationTest extends TestCase
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
        $response = $this->get(route('backend.admins.products.concentrations.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.concentration.index');
        $response->assertSeeText('Koncentracje');
    }

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.concentrations.create'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.concentration.create');
        $response->assertSeeText('Dodawanie');
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        $item = Concentration::factory()->make();
        $response = $this->post(route('backend.admins.products.concentrations.store', $item->toArray()));
        $response->assertStatus(302);
        $this->assertDatabaseHas('concentrations', ['name' => $item->name]);
    }

    public function testStoreWithValidationError(): void
    {
        $item = Concentration::factory()->make(['name' => '']);
        $response = $this->post(route('backend.admins.products.concentrations.store', $item->toArray()));
        $response->assertStatus(302);
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('concentrations', ['name' => $item->name]);
    }

    public function testStoreWithDuplicateValidationError(): void
    {
        $item = Concentration::factory()->make();
        $response = $this->post(route('backend.admins.products.concentrations.store', $item->toArray()));
        $response = $this->post(route('backend.admins.products.concentrations.store', $item->toArray()));
        $response->assertInvalid(['name' => 'The name has already been taken.']);
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $item = Concentration::factory()->create();
        $response = $this->get(route('backend.admins.products.concentrations.show', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.concentration.show');
        $response->assertSeeText('Koncentracja');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $item = Concentration::factory()->create();
        $response = $this->get(route('backend.admins.products.concentrations.edit', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.concentration.edit');
        $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $item = Concentration::factory()->create();
        $item1 = Concentration::factory()->make();
        $response = $this->put(route('backend.admins.products.concentrations.update', $item), $item1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('concentrations', ['name' => $item1->name]);
    }

    public function testUpdateWithValidationError(): void
    {
        $item = Concentration::factory()->create();
        $item1 = Concentration::factory()->make(['name' => '']);
        $response = $this->put(route('backend.admins.products.concentrations.update', $item), $item1->toArray());
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('concentrations', ['name' => $item1->name]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $item = Concentration::factory()->create();
        $response = $this->delete(route('backend.admins.products.concentrations.destroy', $item));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('concentrations', ['name' => $item->name]);
    }
}
