<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Traits\CategoryTree;

class IndexController extends Controller
{
    public function index()
    {
        $items = Product::paginate(20);
        $categories = CategoryTree::getCategories();
        $view = view('main', ['items' => $items, 'categories' => $categories])->render();

        return (new Response($view));
    }

    public function category($path)
    {
        $category = Category::where('alias', $path)->get();
        $cat = $category->toArray();
        $products = Category::find($cat[0]['id'])->products()->paginate(5);
        $categories = CategoryTree::getCategories();
        $view = view('main', ['items' => $products, 'categories' => $categories])->render();

        return (new Response($view));
    }
}