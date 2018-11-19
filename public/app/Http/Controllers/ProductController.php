<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Product;
use App\Http\Controllers\Traits\CategoryTree;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        $categories = CategoryTree::getCategories();
        $view = view('product', ['item' => $product, 'categories' => $categories])->render();

        return (new Response($view));
    }
}
