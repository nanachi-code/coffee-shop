<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'customer_address', 'customer_city', 'customer_country', 'customer_email', 'customer_name',
        'customer_phone', 'customer_postcode', 'method', 'status', 'total'
    ];
    const STATUS_PENDING = 0;
    const STATUS_PROCESSing = 1;
    const STATUS_SHIPPING = 2;
    const STATUS_COMPLETEd = 3;
    const STATUS_CANCELLED = 4;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'product_id', 'order_id')->withPivot('quantity');
    }
}
