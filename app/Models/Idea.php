<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $table = 'twitter';



    protected $fillable = [
        'user_id',
        'content',
    ];

    protected $withCount = [
        'likes'
    ];

    protected $with = ['user:id,name,image', 'comments.user'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'tweet_likes')->withTimestamps();
    }

    public function scopeSearch(Builder $query, $searchTerm = '') {
        $query->where('content', 'like', '%' . $searchTerm . '%');
    }

}
