<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = ['post_id', 'user_id', 'content', 'parent_id', 'updated_at'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getParentAttribute()
    {
        return $this::where('id', $this->parent_id)->first();
    }
}
