<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Card extends Component
{
    public function render()
    {
        return view('livewire.card');
    }
    public function addToCart($slug)
    {
        // Find the product with the given slug
        $product = Product::where('slug', $slug)->first();
        // Check if the product exists
        dd($product);
        if ($product) {
            // Add the product to the session variable 'cart'
            $cart = session('cart', []);
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1, // You can set a default quantity here
            ];
            session(['cart' => $cart]);

            // Optionally, you can emit an event to notify JavaScript about the change in cart
            $this->emit('cartUpdated');

            // Optionally, you can redirect the user to another page
            // return redirect()->route('cart.index');
        } else {
            // Product not found
            // You can handle this case accordingly, like showing an error message
        }
    }
       
}
