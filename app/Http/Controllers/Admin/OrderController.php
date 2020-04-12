<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function renderArchiveOrder()
    {
        $p = [
            'orders' => Order::all()
        ];

        return view('admin/archive-order')->with($p);
    }

    public function renderSingleOrder($id)
    {
        $p = [
            'order' => Order::find($id),

        ];
        dd($order);
        return view('admin/single-order')->with($p);
    }

    public function renderNewOrder()
    {
        $p = [
            'allProducts' => Product::all()
        ];

        return view('admin/new-order')->with($p);
    }

    public function createOrder()
    {
    }
}
