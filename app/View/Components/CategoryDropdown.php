<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class CategoryDropdown extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('components.category-dropdown',['categories'=>$categories]);
    }
}
