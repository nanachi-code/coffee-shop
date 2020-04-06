<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['price_id', 'description', 'name', 'stock', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
