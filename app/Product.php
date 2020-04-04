<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['price_id', 'desc', 'name', 'stock'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'product_id', 'order_id')->withPivot('size_id', 'quantity');
    }
}
