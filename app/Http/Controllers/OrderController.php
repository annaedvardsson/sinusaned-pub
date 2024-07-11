<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Role;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminindex()
    {
        $orders = Order::get();
        return view('orders.adminindex', ['orders' => $orders]);
    }

    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->get();

        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store($cart_id, Cart $cart)
    {
        $cart = Cart::with('cartDetails.product')->find($cart_id);

        // Create a new order from cart information
        $order = Order::create([
            'user_id' => $cart->user_id,
            'cart_id' => $cart->id,
            'total_sum' => $cart->total_sum,
            'is_accessible' => 1,
        ]);

        // Create order details from cart details, exclude removed products
        foreach ($cart->cartDetails as $cartDetail) {
            if ($cartDetail->is_accessible == 1) {
                $order->orderDetails()->create([
                    'product_id' => $cartDetail->product_id,
                    'quantity' => $cartDetail->quantity,
                    'is_accessible' => $cartDetail->is_accessible,
                ]);
            }
        }

        // Set cart accessibility to false (0)
        $cart->update(['is_accessible' => 0]);

        // Load order details and products
        $order->load('orderDetails.product');

        return view('orders.show', ['order' => $order])->with('message', 'Your products have been ordered!');
    }


    /** Display the specified resource. */
    public function adminshow(Order $order)
    {
        $order->load('orderDetails.product');

        return view('orders.adminshow', compact('order'));
    }
    public function show(Order $order)
    {
        // Load related order details and products
        $order->load('orderDetails.product');

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
