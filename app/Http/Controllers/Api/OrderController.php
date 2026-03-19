<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user_id,
            'status' => 'new',
            'price' => $request->price
        ]);

        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_article' => $item['article'],
                'quantity' => $item['quantity']
            ]);
        }

        // очистка корзины
        CartItem::where('user_id', $request->user_id)->delete();

        return $order;
    }

    public function userOrders($user_id)
    {
        return Order::with('items')->where('user_id', $user_id)->get();
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return $order;
    }
}