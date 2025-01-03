<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Geo\Voivodeship;
use App\Models\Customer\Customer;

class CustomerTest extends TestCase
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
        $response = $this->get(route('backend.admins.customers.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.customer.index');
        $response->assertSeeText('Klienci');
    }

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.customers.create'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.customer.create');
        $response->assertSeeText('Dodawanie');
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        $voivodeship = Voivodeship::factory()->create();
        $item = Customer::factory()->for($voivodeship)->create();
        $response = $this->post(route('backend.admins.customers.store', $item->toArray()));
        $response->assertStatus(302);
        $this->assertDatabaseHas('customers', ['name' => $item->name]);
    }

    public function testStoreWithValidationError(): void
    {
        $voivodeship = Voivodeship::factory()->create();
        $item = Customer::factory()->for($voivodeship)->make(['name' => '']);
        $response = $this->post(route('backend.admins.customers.store', $item->toArray()));
        $response->assertStatus(302);
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('customers', ['name' => $item->name]);
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $voivodeship = Voivodeship::factory()->create();
        $item = Customer::factory()->for($voivodeship)->create();
        $response = $this->get(route('backend.admins.customers.show', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.customer.show');
        $response->assertSeeText('Klient');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $voivodeship = Voivodeship::factory()->create();
        $item = Customer::factory()->for($voivodeship)->create();
        $response = $this->get(route('backend.admins.customers.edit', $item));
        $response->assertOk();
        $response->assertViewIs('backend.admin.customer.edit');
        $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $voivodeship = Voivodeship::factory()->create();
        $item = Customer::factory()->for($voivodeship)->create();
        $item1 = Customer::factory()->for($voivodeship)->make();
        $response = $this->put(route('backend.admins.customers.update', $item), $item1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('customers', ['name' => $item1->name]);
    }

    public function testUpdateWithValidationError(): void
    {
        $voivodeship = Voivodeship::factory()->create();
        $item = Customer::factory()->for($voivodeship)->create();
        $item1 = Customer::factory()->for($voivodeship)->make(['name' => '']);
        $response = $this->put(route('backend.admins.customers.update', $item), $item1->toArray());
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('customers', ['name' => $item1->name]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $voivodeship = Voivodeship::factory()->create();
        $item = Customer::factory()->for($voivodeship)->create();
        $response = $this->delete(route('backend.admins.customers.destroy', $item));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('customers', ['name' => $item->name]);
    }
}
