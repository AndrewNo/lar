<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\OrderShipped;
use App\Models\Order;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;

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


        //mail/order to owner of site
        Mail::send('email.order', ['order' => $order], function ($m){
            $m->from('andrewenot@gmail.com', 'Your site');
            $m->to('andrewenot@gmail.com')->subject('New Order');
        });

        //mail/order to user
        Mail::to($order->email)->send(new OrderShipped($order));

        return back();
    }

    public function archiveShow()
    {
        $orders = Order::where('is_done', '=', 1)->get();

        return view('admin.order.archive', ['orders' => $orders]);
    }
}
