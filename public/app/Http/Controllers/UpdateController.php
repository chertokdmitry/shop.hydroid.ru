<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;

class UpdateController extends Controller
{
    public $data;

    public function __construct()
    {
        $string = file_get_contents("https://markethot.ru/export/bestsp");
        $this->data = json_decode($string, true);
    }

    public function products()
    {
        Product::query()->truncate();

        foreach ($this->data['products'] as $item) {

            $product = new Product;
            $product->id = $item['id'];
            $product->title = $item['title'];
            $product->image = $item['image'];
            $product->description = $item['description'];
            $product->first_invoice = $item['first_invoice'];
            $product->url = $item['url'];
            $product->price = $item['price'];
            $product->amount = $item['amount'];
            $product->save();

////            echo "<br>";
////            dump($item['offers']);
////            echo "<br>";
////            dump($item['categories']);
////        echo "<br><br>";
        }

        return redirect('/');
    }

    public function categories()
    {
        Category::query()->truncate();

        foreach ($this->data['products'] as $item) {


            foreach ($item['categories'] as $item) {
                if(!Category::find($item['id'])) {
                    $category = new Category;
                    $category->id = $item['id'];
                    $category->title = $item['title'];
                    $category->alias = $item['alias'];
                    $category->parent = $item['parent'];
                    $category->save();
                }
            }
        }

        return redirect('/');
    }
}
