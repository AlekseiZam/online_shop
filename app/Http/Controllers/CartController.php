<?php

namespace App\Http\Controllers;

use App\Models\Good;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = \Cart::session(session()->get('user_id'))->getContent();

        return view('cart', compact('cart'));
    }

    public function addToCart(Request $request){
        $good = Good::where('id', $request->id)->first();
        \Cart::session(session()->get('user_id'))->add(array(
            'id' => $good->id,
            'name' => $good->name,
            'price' => $good->price,
            'quantity' => (int)$request->qty,
            'attributes' => [
                'brand' => $good->brand['name'] ? $good->brand['name'] : '',
                'manufacturer' => $good->manufacturer['name'] ? $good->manufacturer['name'] : '',
                'img' => $good->image ? $good->image : 'storage/uploads/no_image.jpg',
            ]
        ));

        return response()->json(\Cart::getContent());
    }

    public function deleteGood(Request $request)
    {
        \Cart::session(session()->get('user_id'))->remove($request->id);
        $cart = \Cart::session(session()->get('user_id'))->getContent();

        return response()->json(\Cart::getContent());
    }
}
