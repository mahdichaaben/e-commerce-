<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment; 
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function index(Product $product){
        //$post = Post::where('slug', $slug)->firstOrFail();
        return view('product.article',[
            'product'=> $product
        ]);
    }
    public function storeComment(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        $comment = new Comment([
            'product_id' => $request->input('product_id'),
            'user_id' => $request->input('user_id'),
            'body' => $request->input('body'),
        ]);

        $comment->save();

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }
    
    public function destroyComment(Comment $comment)
    {
        if (Auth::user()&& Auth::user()->id === $comment->user_id) {
            // Only allow the delete if the user is the owner of the comment
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }
    }
}


