<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Ver el carrito
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        
        return view('cart.index', compact('cart', 'total'));
    }

    // Agregar producto al carrito
    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'image'    => $product->image,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 
            '"' . $product->name . '" added to cart.');
    }

    // Actualizar cantidad
    public function update(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:99'
        ]);

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Cart updated.');
    }

    // Eliminar un item
    public function remove($productId)
    {
        $cart = Session::get('cart', []);
        unset($cart[$productId]);
        Session::put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'Item removed from cart.');
    }

    // Vaciar el carrito
    public function clear()
    {
        Session::forget('cart');
        return redirect()->route('cart.index')
            ->with('success', 'Cart cleared.');
    }
}