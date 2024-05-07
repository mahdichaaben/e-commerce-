<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public $cartItems;

    public function __construct()
    {
        $this->cartItems = new Collection();
    }

    public function show()
    {
        
        $this->cartItems = new Collection();
        // Retrieve the cart items from session
        $cartIds = session('cart', []);

        // Fetch products for each cart item id
        foreach ($cartIds as $cartId) {
            $product = Product::find($cartId);
            if ($product) {
                // Add product to $cartItems array
                $this->cartItems->push($product);
            }
        }

        return view('shopping.cart', [
            'cartItems' => $this->cartItems,
        ]);
    }

    public function removeFromCart($productId)
    {
      
        // Retrieve cart items from session
        $cart = session('cart', []);
    
        // Find the index of the product in the cart array
        $index = array_search($productId, $cart);
      
        // If found, remove the product from the cart
        $cart = array_values(array_filter($cart, function($value) use ($productId) {
            return $value != $productId;
        }));
        
        
        // Store the modified cart array back to the session
        session(['cart' => $cart]);
    
        // Dump the modified cart array
        
    
      
        return redirect()->route('cart.show');
    }

    public function addToCart(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // Retrieve the product based on the product_id
        $product = Product::find($request->input('product_id'));

        // Check if the product exists
        if ($product) {
            // Add product id to cart session
            session()->push('cart', $product->id);
           
            if ($request->ajax()) {
                return response()->json(['message' => 'Product added to cart successfully']);
            } else {
                return redirect()->route('cart.show');
            }
        } else {
            // Product not found
            return response()->json(['error' => 'Product not found'], 404);
        }
        
    }

    public function destroyById(Request $request)
    {
        
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        return $this->removeFromCart($request->input('product_id'));
    }

    public function deleteSessionCart()
    {
        // Remove the 'cart' key from the session
        Session::forget('cart');
        return redirect()->route('cart.show')->with('success', 'Cart cleared successfully');
    }
}
