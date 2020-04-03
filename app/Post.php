<?php


namespace App;

Use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['user_id','content','title'];

}
