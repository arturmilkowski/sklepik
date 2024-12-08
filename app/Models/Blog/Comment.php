<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use App\Models\User;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\Blog\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'ip',
        'agent',
        'content',
        'author',
        'approved',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*
    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }
        */
}
