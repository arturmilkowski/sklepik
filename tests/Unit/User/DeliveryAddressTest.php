<?php

namespace Tests\Unit\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\User\{Profile, DeliveryAddress};
use App\Models\Geo\Voivodeship;

class DeliveryAddressTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeDeliveryAddress(): void
    {
        $deliveryAddress = DeliveryAddress::factory()->make();

        $this->assertInstanceOf(DeliveryAddress::class, $deliveryAddress);
    }

    public function testCreateDeliveryAddress(): void
    {
        $voivodeship = Voivodeship::factory()->create();
        $profile = Profile::factory()
            ->for(User::factory())
            ->for(Voivodeship::factory())
            ->create();
        $deliveryAddress = DeliveryAddress::factory()
            ->for($profile)
            ->for($voivodeship)
            ->create();

        $this->assertModelExists($deliveryAddress);
        $this->assertDatabaseHas('delivery_addresses', [
            'profile_id' => $profile->id,
            'voivodeship_id' => $voivodeship->id,
            'street' => $deliveryAddress->street,
            'zip_code' => $deliveryAddress->zip_code,
            'city' => $deliveryAddress->city,
        ]);
    }

    public function testDeliveryAddressBelongsToProfile(): void
    {
        $deliveryAddress = DeliveryAddress::factory()
            ->for(
                Profile::factory()
                    ->for(User::factory())
                    ->for(Voivodeship::factory())
            )
            ->for(Voivodeship::factory())
            ->create();

        $this->assertInstanceOf(Profile::class, $deliveryAddress->profile);
    }

    public function testDeliveryAddressBelongsToVoivodeship(): void
    {
        $deliveryAddress = DeliveryAddress::factory()
            ->for(
                Profile::factory()
                    ->for(User::factory())
                    ->for(Voivodeship::factory())
            )
            ->for(Voivodeship::factory())
            ->create();

        $this->assertInstanceOf(Voivodeship::class, $deliveryAddress->voivodeship);
    }
}
