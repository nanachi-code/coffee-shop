<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['user_id', 'content', 'title', 'comment_count', 'thumbnail', 'category_post_id', 'status', 'updated_at', 'status'];

    public function category()
    {
        return $this->belongsTo(CategoryPost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
