<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $guarded = [];

    public function comments() {
        return $this->hasMany(Comment::class, 'news_id');
    }

    public function tags() {
        return $this->hasMany(NewsTags::class, 'news_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}
