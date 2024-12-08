<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany, HasMany};
use App\Models\User;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\Blog\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'intro',
        'content',
        'img',
        'site_description',
        'site_keyword',
        'approved',
        'published',
        'comments_allowed',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /*
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
    */
}
