<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'admin_id',
        'category_id',
        'title',
        'description',
        'likes',
        'dislikes',
        'shares',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function comments()
    {
        return $this->hasMany(TopicComments::class);
    }

    public function likesClass() {
        return $this->hasMany(TopicLike::class);
    }

}
