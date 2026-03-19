<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index($user_id)
    {
        return CartItem::with('product')
            ->where('user_id', $user_id)
            ->get();
    }

    public function add(Request $request)
    {
        $item = CartItem::where('user_id', $request->user_id)
            ->where('product_article', $request->product_article)
            ->first();

        if ($item) {
            $item->quantity += $request->quantity;
            $item->save();
            return $item;
        }

        return CartItem::create($request->all());
    }

    public function remove($id)
    {
        CartItem::destroy($id);
        return response()->json(['message' => 'deleted']);
    }
}