<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $guarded = [];
    public $timestamps = false;

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

    public static function getDataById($id)
    {
        $model = new Static;
        return $model->where('id', $id)->first();
    }

    public static function store($arrData)
    {
        $model = new Static;
        $model->title = $arrData['news_title'];
        $model->content = $arrData['news_content'];
        $model->thumbnail = $arrData['thumbnail'];
        $model->category_id = $arrData['news_category'];
        $model->published = $arrData['published'];
        $model->author_id = $arrData['author_id'];
        $model->created_at = date('Y-m-d H:i:s');
        $model->user_crt_id = $arrData['author_id'];
        $model->slug = $arrData['slug'];
        $model->save();
    }

    public static function updateData($newsId, $arrData)
    {
        $model = self::getDataById($newsId);
        $model->title = $arrData['news_title'];
        $model->content = $arrData['news_content'];
        if ( isset($arrData['thumbnail']) ) $model->thumbnail = $arrData['thumbnail'];
        $model->category_id = $arrData['news_category'];
        $model->published = $arrData['published'];
        $model->author_id = $arrData['author_id'];
        $model->updated_at = date('Y-m-d H:i:s');
        $model->user_upd_id = $arrData['author_id'];
        $model->slug = $arrData['slug'];
        $model->save();
    }

}
