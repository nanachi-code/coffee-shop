<?php


namespace App;

Use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = ['post_id','user_id','content'];
}
