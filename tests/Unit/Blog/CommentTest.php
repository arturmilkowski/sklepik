<?php

namespace Tests\Unit\Blog;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use App\Models\Blog\{Post, Comment, Reply};
use App\Models\User;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeComment(): void
    {
        $comment = Comment::factory()->make();

        $this->assertInstanceOf(Comment::class, $comment);
    }

    public function testCreateComment(): void
    {
        $post = Post::factory()->for(User::factory())->create();
        $user = User::factory()->make();
        $comment = Comment::factory()
            ->for($post)
            ->for($user)
            ->create();

        $this->assertModelExists($comment);
        $this->assertDatabaseHas('comments', [
            'post_id' => $post->id,
            'user_id' => $user->id,
            'ip' => $comment->ip,
            'agent' => $comment->agent,
            'content' => $comment->content,
            'author' => $comment->author,
            'approved' => $comment->approved,
        ]);
    }

    public function testCommentBelongsToPost(): void
    {
        $post = Post::factory()->for(User::factory())->create();
        $user = User::factory()->create();


        $comment = Comment::factory()
            ->for($post)
            ->for($user)
            ->create();

        $post = $comment->post;

        $this->assertInstanceOf(Post::class, $post);
    }

    public function testCommentBelongsToUser(): void
    {
        $post = Post::factory()->for(User::factory())->create();
        $user = User::factory()->create();

        $comment = Comment::factory()
            ->for($post)
            ->for($user)
            ->create();

        $user = $comment->user;

        $this->assertInstanceOf(User::class, $user);
    }
    /*
    public function testCommentHasManyReplies(): void
    {
        $post = Post::factory()->for(User::factory())->create();
        $user = User::factory()->create();

        $comment = Comment::factory()
            ->for($post)
            ->for($user)
            ->has(Reply::factory())
            ->create();
        $replies = $comment->replies;

        $this->assertInstanceOf(Collection::class, $replies);
    }
    */
}
