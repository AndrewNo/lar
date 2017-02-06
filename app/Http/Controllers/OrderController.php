<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderShow()
    {
        $orders = Order::where('is_done', '=', 0)->get();

        return view('admin.order.show', ['orders' => $orders]);
    }

    public function orderDone($id)
    {
        $order = Order::find($id);

        $order->is_done = 1;

        $order->save();

        return redirect('/admin/orders');
    }

    public function indexOrderStore(Request $request, Order $order)
    {
        $data = $request->all();

        $order->product_id = $data['product_id'];
        $order->name = $data['name'];
        $order->phone = $data['phone'];
        $order->email = $data['email'];
        $order->city = $data['city'];
        $order->comment = $data['comment'];

        $order->save();

        return back();
    }

    public function archiveShow()
    {
        $orders = Order::where('is_done', '=', 1)->get();

        return view('admin.order.archive', ['orders' => $orders]);
    }
}
