<?php

namespace Tests\Unit\Blog;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Blog\{Post, Comment, Tag};

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testMakePost(): void
    {
        $post = Post::factory()->make();

        $this->assertInstanceOf(Post::class, $post);
    }

    public function testCreatePost(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->for($user)->create();

        $this->assertModelExists($post);
        $this->assertDatabaseHas('posts', [
            'user_id' => $user->id,
            'slug' => $post->slug,
            'title' => $post->title,
            'intro' => $post->intro,
            'approved' => $post->approved,
            'published' => $post->published,
            'comments_allowed' => $post->comments_allowed,
        ]);
    }

    public function testPostBelongsToUser(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->for($user)->create();

        $this->assertInstanceOf(User::class, $post->user);
    }

    /*
    public function testPostHasManyComments(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->for($user)->has(Comment::factory())->create();

        $this->assertInstanceOf(Collection::class, $post->comments);
    }

    public function testPostBelongsToManyTags(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()
            ->for($user)
            ->has(Tag::factory())
            ->create();

        $this->assertInstanceOf(Collection::class, $post->tags);
    }
    */
}
