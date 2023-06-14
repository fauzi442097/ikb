<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $guarded = [];
    public $timestamps = false;

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comment() {
        return $this->belongsTo(News::class, 'news_id');
    }
}
