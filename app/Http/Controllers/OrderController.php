<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Good;
use App\Models\GoodOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use function Webmozart\Assert\Tests\StaticAnalysis\null;

class OrderController extends Controller
{
    public function index()
    {
        $cart = \Cart::session(session()->get('user_id'))->getContent();

        return view('order', compact('cart'));
    }

    public function make_order(OrderRequest $request)
    {
        $data = $request->validated();
        $user_id = session()->get('user_id');
        $cart = \Cart::session(session()->get('user_id'))->getContent();
        $order_id = GoodOrder::select('order_id')->orderByDesc('order_id')->first();
        if ($order_id != null)
        {
            $order_id = $order_id->order_id + 1;
        }
        else $order_id = 1;
        foreach ($cart as $item)
        {
            $good_order = new GoodOrder();
            $good_order->order_id = $order_id;
            $good_order->good_id = $item->id;
            $good_order->quantity = $item->quantity;
            $good_order->save();
            $qty = Good::find($item->id)->count;
            Good::find($item->id)->update(['count' => $qty-$item->quantity]);
        }
        $data['order_id'] = $order_id;
        $data['user_id'] = $user_id;
        $data['cost'] = \Cart::session(session()->get('user_id'))->getTotal();
        Order::firstOrCreate($data);
        \Cart::session(session()->get('user_id'))->clear();

        return redirect()->route('toCart');
    }

    public function order_list()
    {
        $orders = Order::where('user_id', session()->get('user_id'))->paginate(10);
        return view('order_list', compact('orders'));
    }
}
