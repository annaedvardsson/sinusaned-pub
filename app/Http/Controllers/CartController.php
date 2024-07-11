<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Role;
use App\Models\Product;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /** Display a listing of the resource. */
    public function index()
    {
        abort_if(auth()->user()->role_id != Role::IS_ADMIN, 403, 'Page does not exist');

        $carts = Cart::get();
        return view('carts.index', ['carts' => $carts]);
        // return view('carts.index', compact('carts')); //Same function
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function add(Request $request, Product $product)
    {
        // Check if the user is logged in (total_sum' and 'is_accessible' are set to 0 and 1, respectively, as default (in migrations))
        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::where('user_id', $user->id)->orderBy('id', 'desc')->first();

            if (!$cart || $cart->is_accessible == 0) {
                $cart = Cart::create(['user_id' => $user->id]);
            }

        } else {
            $sessionID = $request->session()->getId();
            $cart = Cart::where('session_id', $sessionID)->orderBy('id', 'desc')->first();

            if (!$cart || $cart->is_accessible == 0) {
                $cart = Cart::create(['session_id' => $sessionID]);
            }

            // Store the cart details in the session (to be retrieved if logged in at a later stage)
            $request->session()->put('cartDetails', [
                'cart_id' => $cart->id,
            ]);
        }

        $cartDetail = CartDetail::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartDetail) {
            // If the cart detail already exists, update the quantity
            $cartDetail->increment('quantity');
        } else {
            // If the cart detail doesn't exist, create a new one
            $cartDetail = CartDetail::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'is_accessible' => true,
            ]);
        }

        // Update the cart's total sum
        $cart->total_sum += $product->price;
        $cart->save();

        return redirect()->back()->with('message', 'Product added to cart.');
    }

    public function store(Request $request)
    {
        //
    }

    /** Display the specified resource. */
    public function adminshow(Cart $cart)
    {
        $cart->load('cartDetails.product');
        return view('carts.adminshow', compact('cart'));
    }

    public function show(Cart $cart)
    {
        $cart->load('cartDetails.product');
        return view('carts.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /** Update the specified resource in storage. */
    public function updateCartDetail(Request $request, CartDetail $cartDetail)
    {
        $totalSum = $cartDetail->cart->total_sum;

        if ($request->button_pressed == 'update') {
            $diff = $request->input('quantity') - $cartDetail->quantity;
            $totalSum += $cartDetail->product->price * $diff;

            $cartDetail->update([
                'quantity' => $request->input('quantity')
            ]);
        }

        if ($request->button_pressed == 'remove') {
            $totalSum -= $cartDetail->product->price * $cartDetail->quantity;

            $cartDetail->update([
                'is_accessible' => 0
            ]);
        }
        
        $cartDetail->cart->update([
            'total_sum' => $totalSum
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
