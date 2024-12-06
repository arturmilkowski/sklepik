<?php

namespace Tests\Unit\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\User\{Profile, DeliveryAddress};
use App\Models\Geo\Voivodeship;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeProfile(): void
    {
        $profile = Profile::factory()->make();

        $this->assertInstanceOf(Profile::class, $profile);
    }

    public function testCreateProfile(): void
    {
        $user = User::factory()->create();
        $voivodeship = Voivodeship::factory()->create();
        $profile = Profile::factory()
            ->for($user)
            ->for($voivodeship)
            ->create();

        $this->assertModelExists($profile);
        $this->assertDatabaseHas('profiles', [
            'user_id' => $user->id,
            'voivodeship_id' => $voivodeship->id,
            'surname' => $profile->surname,
            'street' => $profile->street,
            'zip_code' => $profile->zip_code,
            'city' => $profile->city,
            'phone' => $profile->phone,
        ]);
    }

    public function testProfileBelongsToUser(): void
    {
        $profile = Profile::factory()
            ->for(User::factory())
            ->for(Voivodeship::factory())
            ->create();

        $this->assertInstanceOf(User::class, $profile->user);
    }

    public function testProfileBelongsToVoivodeship(): void
    {
        $profile = Profile::factory()
            ->for(User::factory())
            ->for(Voivodeship::factory())
            ->create();

        $this->assertInstanceOf(Voivodeship::class, $profile->voivodeship);
    }

    public function testProfileHasOneDeliveryAddress(): void
    {
        $profile = Profile::factory()
            ->for(User::factory())
            ->for(Voivodeship::factory())
            ->has(DeliveryAddress::factory()->for(Voivodeship::factory()))
            ->create();

        $deliveryAddress = $profile->deliveryAddress;

        $this->assertInstanceOf(DeliveryAddress::class, $deliveryAddress);
    }
}
