<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            $category->products->each(function ($product) {
                $product->category_id = null;
                $product->save();
            });
        });
    }
}
