<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Size extends Model
{
    protected $table = 'category';

    protected $fillable = ['user_id','content','title'];
}
