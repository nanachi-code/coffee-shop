<?php


namespace App;

Use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $table = 'order';

    protected $fillable = ['customer_address','customer_city','customer_country','customer_email','customer_name',
    'customer_phone','customer_postcode','method','status','total'];
}
