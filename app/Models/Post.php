<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'cover',
        'title',
        'slug',
        'content',
        'published_at',
        'featured',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'published_at' => 'datetime',
        'featured' => 'boolean',
        'status' => PostStatus::class,
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function booted()
    {
        static::creating(function ($post) {
            if (auth()->check()) {
                $post->user_id = auth()->id();
            }

            if ($post->status === PostStatus::Published) {
                $post->published_at = now();
            }
        });

        static::updating(function ($post) {
            if ($post->status === PostStatus::Published && is_null($post->published_at)) {
                $post->published_at = now();
            } elseif ($post->status !== PostStatus::Published) {
                $post->published_at = null;
            }
        });
    }
}
