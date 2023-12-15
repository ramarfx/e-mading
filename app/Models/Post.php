<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'priority_level',
        'media_path',
        'media_type',
        'is_accept',
        'link',
        'published_at',
        'is_published'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookmarks() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'bookmarks');
    }

    public function schedulePost(\DateTimeInterface $publishDate)
    {
        $this->published_at = $publishDate;
        $this->save();
    }

    public function viewedBy() : BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_views')->withTimestamps();
    }
}
