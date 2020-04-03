<?php


namespace App;

Use Illuminate\Database\Eloquent\Model;


class Order_Product extends Model
{
    protected $table = 'order_product';

    protected $fillable = ['order_id','product_id','size_id','quantity','total'];
}
