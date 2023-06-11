<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tags';

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tags', 'tags_id', 'news_id');
    }

}
