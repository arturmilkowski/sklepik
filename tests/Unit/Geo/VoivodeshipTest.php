<?php

namespace Tests\Unit\Geo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Geo\Voivodeship;
use App\Models\User;

// use App\Models\User\{Profile, DeliveryAddress};

class VoivodeshipTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeVoivodeship(): void
    {
        $voivodeship = Voivodeship::factory()->make();

        $this->assertInstanceOf(Voivodeship::class, $voivodeship);
    }

    public function testCreateVoivodeship(): void
    {
        $voivodeship = Voivodeship::factory()->create();

        $this->assertModelExists($voivodeship);
        $this->assertDatabaseHas('voivodeships', ['name' => $voivodeship->name]);
    }

    /*
    public function testVoivodeshipHasManyProfiles(): void
    {
        $voivodeship = Voivodeship::factory()->has(Profile::factory()->for(User::factory()))->create();

        $this->assertInstanceOf(Collection::class, $voivodeship->profiles);
    }
    */
    /*
    public function testVoivodeshipHasManyDeliveryAddresses(): void
    {
        $voivodeship = Voivodeship::factory()
            ->has(Profile::factory()->for(User::factory()))
            ->has(
                DeliveryAddress::factory()
                    ->for(
                        Profile::factory()
                            ->for(User::factory())
                            ->for(Voivodeship::factory())
                    )
            )
            ->create();

        $this->assertInstanceOf(Collection::class, $voivodeship->deliveryAddresses);
    }
    */
}
