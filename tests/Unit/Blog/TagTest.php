<?php

namespace Tests\Unit\Blog;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Blog\Tag;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function testMakeTag(): void
    {
        $tag = Tag::factory()->make();

        $this->assertInstanceOf(Tag::class, $tag);
    }

    public function testCreateTag(): void
    {
        $tag = Tag::factory()->create();

        $this->assertModelExists($tag);
        $this->assertDatabaseHas('tags', [
            'slug' => $tag->slug,
            'name' => $tag->name,
        ]);
    }

    public function testTagBelongsToManyPost(): void
    {
        $tag = Tag::factory()->create();

        $this->assertInstanceOf(Collection::class, $tag->posts);
    }
}
