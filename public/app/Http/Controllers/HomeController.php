<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\Traits\CategoryTree;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function main()
    {
        $categories = CategoryTree::getCategories();

        $view = view('crm/home', ['categories' => $categories])->render();

        return (new Response($view));
    }

    public function homecategory($path)
    {
        $category = Category::where('alias', $path)->get();
        $cat = $category->toArray();
        $products = Category::find($cat[0]['id'])->products()->paginate(9);
        $categories = CategoryTree::getCategories();
        $view = view('crm/category', ['items' => $products, 'categories' => $categories])->render();
        return (new Response($view));
    }
}
