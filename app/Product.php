<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['category_product_id', 'description', 'name', 'stock', 'price', 'thumbnail'];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class);
    }
}
