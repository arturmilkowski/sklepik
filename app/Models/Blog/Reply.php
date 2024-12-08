<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Reply extends Model
{
    /** @use HasFactory<\Database\Factories\Blog\ReplyFactory> */
    use HasFactory;

    protected $fillable = [
        'comment_id',
        'user_id',
        'content',
        'author',
        'approved',
    ];


    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
