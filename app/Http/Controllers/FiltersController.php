<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FiltersController extends Controller
{
    public function index()
    {
      
        
        return view('filterPage.index', [
            'products' => $this->getProducts(),
        ]);
        
    }
    public function getProducts(){
        $products=Product::latest();
        $keywords=request('keywords');
        if(request('keywords')){
            $products->where('name' ,'like','%'.$keywords.'%')
            ->orWhere('description' ,'like','%'.$keywords.'%')
            ->orWhere('slug' ,'like','%'.$keywords.'%');
        }
        return $products->get();
    }
}
