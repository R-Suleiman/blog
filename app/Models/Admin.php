<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
/** @use HasFactory<\Database\Factories\UserFactory> */
use HasFactory, Notifiable;

    protected $fillable = ['first_name', 'last_name', 'email', 'title', 'bio', 'rank', 'password', 'photo'];

    public function posts():HasMany {
        return $this->hasMany(Post::class);
    }

    public function topics() {
        return $this->hasMany(Topic::class);
    }

    public function comments() {
        return $this->morphMany(TopicComments::class, 'commentable');
    }

    public function topicLikes() {
        return $this->morphMany(TopicLike::class, 'likable');
    }

}
