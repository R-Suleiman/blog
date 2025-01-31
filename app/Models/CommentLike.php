<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    protected $fillable = [
        'comment_id',
        'likable_id',
        'likable_type',
    ];

    public function comment()
    {
        return $this->belongsTo(TopicComments::class);
    }

    public function likable()
    {
        return $this->morphTo();
    }
}
