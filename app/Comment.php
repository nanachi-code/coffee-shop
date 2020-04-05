<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable = ['post_id', 'user_id', 'content','parent'];

    public function Posts()
    {
        return $this->belongsTo("\App\Post");
    }

    public function Users()
    {
        return $this->belongsTo("\App\User");
    }
}
