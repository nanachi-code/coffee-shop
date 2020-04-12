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
            'cart' => Order::find($id)->products,
            'allProducts' => Product::all()
        ];
        //dd($p['cart']);
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

    public function updateOrder($id,Request $request)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        $p = [
            'order' => $order,
            'cart' => Order::find($id)->products,
            'allProducts' => Product::all()
        ];
        return view('admin/single-order')->with($p);
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->status = Order::STATUS_CANCELLED;
        $order->save();
        return redirect()->back();
    }

    public function restoreOrder()
    {
    }
}
