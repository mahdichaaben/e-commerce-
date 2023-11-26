<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($category)
    {
        if (is_string($category)) {
            $category = Category::where('name', $category)->firstOrFail();
        }

        return $this->handleCategoryView($category);
    }

    public function showChild($parentName, $childName)
    {
        $category = Category::where('name', $childName)->firstOrFail();
        return $this->handleCategoryView($category);
    }

    public function showSubchild($parentName, $childName, $subchildName)
    {
        $category = Category::where('name', $subchildName)->firstOrFail();
        return $this->handleCategoryView($category);
    }

    private function handleCategoryView($category)
    {
        $breadcrumbs = $this->getBreadcrumbs($category);

        if ($category->level === 1) {
            return view('category.cat1', ['category' => $category, 'breadcrumbs' => $breadcrumbs]);
        } elseif ($category->level === 2) {
            return view('category.cat2', ['category' => $category, 'breadcrumbs' => $breadcrumbs]);
        } elseif ($category->level === 3) {
            return view('category.cat3', ['category' => $category, 'breadcrumbs' => $breadcrumbs]);
        }
        abort(404);
    }

    private function getBreadcrumbs(Category $category)
    {
        $breadcrumbs = [];
        $currentCategory = $category;

        while ($currentCategory) {
            array_unshift($breadcrumbs, $currentCategory);
            $currentCategory = $currentCategory->parent;
        }

        return $breadcrumbs;
    }
}
