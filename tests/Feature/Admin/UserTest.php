<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.users.index'));
        $response->assertOk();
        $response->assertViewIs('backend.admin.user.index');
        $response->assertSeeText('Użytkownicy sklepu');
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.users.show', $this->user));
        $response->assertOk();
        $response->assertViewIs('backend.admin.user.show');
        $response->assertSeeText('Użytkownik sklepu');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.users.edit', $this->user));
        $response->assertOk();
        $response->assertViewIs('backend.admin.user.edit');
        $response->assertSeeText('Edycja');
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->delete(route('backend.admins.users.destroy', $this->user));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('users', ['id' => $this->user->id]);
    }
}
