<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    //
    protected $table = 'post_category';

    protected $fillable = ['name'];

    public function Posts()
    {
        return $this->hasMany(Post::class);
    }
}
