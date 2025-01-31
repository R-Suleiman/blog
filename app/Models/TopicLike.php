<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicLike extends Model
{
    protected $fillable = ['topic_id', 'likable_id', 'likable_type'];

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

    public function likable()
    {
        return $this->morphTo();
    }
}
