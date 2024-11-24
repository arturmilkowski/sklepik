<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeUser(): void
    {
        $user = User::factory()->make();

        $this->assertInstanceOf(User::class, $user);
    }

    public function testCreateUser(): void
    {
        $user = User::factory()->create();

        $this->assertModelExists($user);
        $this->assertDatabaseHas('users', [
            'email' => $user->email,
        ]);
    }
}
