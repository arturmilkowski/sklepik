<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\User\Profile;
use App\Models\Geo\Voivodeship;
use App\Models\Order\Order;
use App\Models\Blog\{Post, Comment, Reply};

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

    public function testUserHasOneProfile(): void
    {
        $user = User::factory()
            ->has(Profile::factory()->for(Voivodeship::factory()))
            ->create();

        $this->assertInstanceOf(Profile::class, $user->profile);
    }

    public function testUserHasOrders(): void
    {
        $user = User::factory()
            ->has(Order::factory())
            ->make();

        $this->assertInstanceOf(Collection::class, $user->orders);
    }

    public function testUserHasManyPosts(): void
    {
        $user = User::factory()
            ->has(Post::factory())
            ->create();

        $this->assertInstanceOf(Collection::class, $user->posts);
    }

    public function testUserHasManyComments(): void
    {
        $user = User::factory()
            ->has(Post::factory()->has(Comment::factory()))
            ->create();

        $this->assertInstanceOf(Collection::class, $user->comments);
    }

    public function testUserHasManyReplies(): void
    {
        $user = User::factory()
            ->has(Post::factory()->has(Comment::factory()->has(Reply::factory())))
            ->create();

        $this->assertInstanceOf(Collection::class, $user->replies);
    }
}
