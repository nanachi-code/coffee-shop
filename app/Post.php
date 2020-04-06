<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['user_id', 'content', 'title','comment_count','thumbnail','post_category_id'];

    public function PostCategory()
    {
        return $this->belongsTo("\App\PostCategory");
    }

    public function User()
    {
        return $this->belongsTo("\App\User");
    }
    public function Comments()
    {
        return $this->hasMany('App\Comment');
    }


}
