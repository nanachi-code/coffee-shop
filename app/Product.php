<?php


namespace App;

Use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['price_id','desc','name','stock'];

}
