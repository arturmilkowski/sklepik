<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\User\{Profile, DeliveryAddress};
use App\Models\Geo\Voivodeship;

class DeliveryAddressTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.users.profiles.delivery-adresses.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.delivery-address.create');
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user);

        $voivodeship = Voivodeship::factory()->create();
        $profile = Profile::factory()
            ->for($user)
            ->for(Voivodeship::factory())
            ->create();
        $deliveryAddress = DeliveryAddress::factory()
            ->for($profile)
            ->for($voivodeship)
            ->create();
        $data = [
            'profile_id' => $profile->id,
            'voivodeship_id' => $voivodeship->id,
            'street' => $deliveryAddress->street,
            'zip_code' => $deliveryAddress->zip_code,
            'city' => $deliveryAddress->city,
        ];
        $response = $this->post(route('backend.users.profiles.delivery-adresses.store', $data));

        $response->assertStatus(302);
        $this->assertDatabaseHas('delivery_addresses', ['profile_id' => $profile->id]);
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $voivodeship = Voivodeship::factory()->create();
        $profile = Profile::factory()
            ->for($user)
            ->for(Voivodeship::factory())
            ->create();
        $deliveryAddress = DeliveryAddress::factory()
            ->for($profile)
            ->for($voivodeship)
            ->create();
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.users.profiles.delivery-adresses.show'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.delivery-address.show');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $voivodeship = Voivodeship::factory()->create();
        $profile = Profile::factory()
            ->for($user)
            ->for(Voivodeship::factory())
            ->create();
        $deliveryAddress = DeliveryAddress::factory()
            ->for($profile)
            ->for($voivodeship)
            ->create();
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.users.profiles.delivery-adresses.edit'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.delivery-address.edit');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $voivodeship = Voivodeship::factory()->create();
        $profile = Profile::factory()
            ->for($user)
            ->for(Voivodeship::factory())
            ->create();
        $deliveryAddress = DeliveryAddress::factory()
            ->for($profile)
            ->for($voivodeship)
            ->create();
        $deliveryAddress1 = DeliveryAddress::factory()
            ->for($profile)
            ->for($voivodeship)
            ->make();
        $response = $this->actingAs($user);
        $response = $this->patch(route('backend.users.profiles.delivery-adresses.update', $deliveryAddress1->toArray()));

        $response->assertStatus(302);
        $this->assertDatabaseHas('delivery_addresses', ['street' => $deliveryAddress1->street]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $voivodeship = Voivodeship::factory()->create();
        $profile = Profile::factory()
            ->for($user)
            ->for(Voivodeship::factory())
            ->create();
        $deliveryAddress = DeliveryAddress::factory()
            ->for($profile)
            ->for($voivodeship)
            ->create();
        $response = $this->actingAs($user);
        $response = $this->delete(route('backend.users.profiles.delivery-adresses.destroy'));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('delivery_addresses', ['profile_id' => $profile->id]);
    }
}
