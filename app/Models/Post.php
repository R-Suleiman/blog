<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = ['admin_id', 'category_id', 'topic', 'title', 'description', 'likes', 'dislikes', 'file', 'file_type', 'featured'];

    public function category():BelongsTo {
        return $this->belongsTo(PostCategory::class);
    }

    public function author():BelongsTo {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    // public function shareableLink() {
    //     return route('post', $this->slug);
    // }
}
