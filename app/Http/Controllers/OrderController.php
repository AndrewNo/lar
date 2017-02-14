<?php

namespace App\Http\Controllers;


use App\Mail\MyOrder;
use App\Mail\OrderShipped;
use App\Mail\UserOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderShow()
    {
        $orders = Order::where('is_done', '=', 0)->get();

        $archive = Order::where('is_done', '=', 1)->count();

        return view('admin.order.show', ['orders' => $orders, 'archive' => $archive]);
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

        \Mail::to('andrewenot@gmail.com')->send(new MyOrder($order));

        \Mail::to($order->email)->send(new UserOrder($order));


        return back()->with('message', 'Спасибо за заказ. В скором времени мы с Вами свяжемся');
    }

    public function archiveShow()
    {
        $orders = Order::where('is_done', '=', 1)->get();

        return view('admin.order.archive', ['orders' => $orders]);
    }
}
