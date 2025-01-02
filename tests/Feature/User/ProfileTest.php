<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\User\Profile;
use App\Models\Geo\Voivodeship;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response = $this->get(route('backend.users.profiles.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.create');
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $voivodeship = Voivodeship::factory()->create();
        $response = $this->actingAs($user);
        $data = [
            'user_id' => $user->id,
            'voivodeship_id' => $voivodeship->id,
            'surname' => 'Kowalski',
            'street' => 'Na Wspólnej 1',
            'zip_code' => '00-950',
            'city' => 'Warszawa',
            'phone' => '123456789',
        ];
        $response = $this->post(route('backend.users.profiles.store'), $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('profiles', ['user_id' => $user->id]);
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $profile = Profile::factory()
            ->for($user)
            ->for(Voivodeship::factory())
            ->create();
        $response = $this->actingAs($user);

        $response = $this->get(route('backend.users.profiles.show'));
        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.show');
    }

    public function testShowWithoutProfile(): void
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $response = $this->actingAs($user);

        $response = $this->get(route('backend.users.profiles.show'));
        $response->assertStatus(200);
        $response->assertViewIs('backend.user.profile.complete');
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
        $response = $this->actingAs($user);
        $data = [
            'user_id' => $user->id,
            'voivodeship_id' => $voivodeship->id,
            'surname' => 'Kowalski',
            'street' => 'Na Wspólnej 1',
            'zip_code' => '00-950',
            'city' => 'Warszawa',
            'phone' => '123456789',
        ];

        $response = $this->patch(route('backend.users.profiles.show'), $data);
        $response->assertStatus(302);
        $this->assertDatabaseHas('profiles', ['surname' => 'Kowalski']);
    }
}
