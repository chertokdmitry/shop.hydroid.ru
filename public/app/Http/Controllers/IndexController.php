<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Product;
use App\Category;


class IndexController extends Controller
{
    public function index()
    {
        $items = Product::paginate(20);

        $categories = $this->categories();


        $view = view('main', ['items' => $items, 'categories' => $categories])->render();
        return (new Response($view));
    }

    public function categories()
    {
        $categories = Category::all();
        $newarray = $categories->toArray();
        $tree = $this->buildTree($newarray);

        return $tree;
//        $view = view('category', ['items' => $tree])->render();
//        return (new Response($view));

    }

    public function buildTree(array $elements, $parentId = 0, $level = 0)
    {
        $branch = array();
        $level_ini = $level;

        foreach ($elements as $element) {
            $level = $level_ini;
            if ($element['parent'] == $parentId) {
                $element ['level'] = $level;
                $children = $this->buildTree($elements, $element['id'], ++$level);
                if ($children) {
                    $element['childs'] =  $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }



}