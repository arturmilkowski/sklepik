<?php

namespace Tests\Unit\Blog;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Blog\{Post, Comment, Reply};

class ReplyTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeReply(): void
    {
        $reply = Reply::factory()->make();
        $this->assertInstanceOf(Reply::class, $reply);
    }

    public function testCreateReply(): void
    {
        $post = Post::factory()->for(User::factory())->create();
        $user = User::factory()->create();
        $user1 = User::factory()->create();

        $comment = Comment::factory()
            ->for($post)
            ->for($user)
            ->create();
        $reply = Reply::factory()->for($comment)->for($user1)->create();

        $this->assertInstanceOf(Reply::class, $reply);
        $this->assertDatabaseHas(
            'replies',
            [
                'comment_id' => $comment->id,
                'user_id' => $user1->id,
                'content' => $reply->content,
                'author' => $reply->author,
                'approved' => $reply->approved,
            ]
        );
    }

    public function testReplyBelongsToComment(): void
    {
        $post = Post::factory()->for(User::factory())->create();
        $user = User::factory()->create();
        $user1 = User::factory()->create();

        $comment = Comment::factory()
            ->for($post)
            ->for($user)
            ->create();
        $reply = Reply::factory()->for($comment)->for($user1)->create();
        $commentReply = $reply->comment;

        $this->assertInstanceOf(Comment::class, $commentReply);
    }

    public function testReplyBelongsToUser(): void
    {
        $post = Post::factory()->for(User::factory())->create();
        $user = User::factory()->create();
        $user1 = User::factory()->create();

        $comment = Comment::factory()
            ->for($post)
            ->for($user)
            ->create();
        $reply = Reply::factory()->for($comment)->for($user1)->create();
        $user = $reply->user;

        $this->assertInstanceOf(User::class, $user);
    }
}
