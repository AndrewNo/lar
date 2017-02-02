<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderShow()
    {
        $orders = Order::all()->where('is_done', '=', 0);

        return view('admin.order.show', ['orders' => $orders]);
    }

    public function orderDone($id)
    {
        $order = Order::find($id);

        $order->is_done = 1;

        $order->save();

        return redirect('/admin/orders');
    }
}
