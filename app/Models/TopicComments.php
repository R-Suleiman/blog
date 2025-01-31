<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicComments extends Model
{
    protected $fillable = [
        'topic_id',
        'user_id',
        'comment',
        'likes',
        'reply_to',
        'commentable_id',
        'commentable_type',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function replies() {
        return $this->hasMany(TopicComments::class, 'reply_to')->with('replies');
    }

    public function likesClass() {
        return $this->hasMany(CommentLike::class, 'id');
    }
}
