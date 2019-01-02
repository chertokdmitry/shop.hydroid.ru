<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Http\Controllers\Traits\CategoryTree;
use Elasticsearch\ClientBuilder;
use App\Models\Product;

class SearchUpdate extends Controller
{
    public function products()
    {
        $client = ClientBuilder::create()->build();

//        $deleteParams = [
//            'index' => 'products'
//        ];
//
//        $client->indices()->delete($deleteParams);

        $items = Product::all();

        foreach ($items as $item) {
            $params = [
                'index' => 'products',
                'type' => 'all',
                'id' => $item->id,
                'body' => [
                    "id" => $item->id,
                    "title" => $item->title,
                    "description" => $item->description
                ]
            ];

            $client->index($params);
        }

        $categories = CategoryTree::getCategories();
        $view = view('crm/home', ['categories' => $categories, 'message'=> 'Поиск ElasticSearch обновлен'])->render();

        return (new Response($view));
    }

    public function authors()
    {
        $client = ClientBuilder::create()->build();

//        $deleteParams = [
//            'index' => 'authors'
//        ];
//        $client->indices()->delete($deleteParams);

        $items = Author::all();

        foreach ($items as $item) {
            $params = [
                'index' => 'authors',
                'type' => 'all',
                'id' => $item->id,
                'body' => [
                    "id" => $item->id,
                    "first" => $item->first,
                    "last" => $item->last
                ]
            ];

            $client->index($params);
        }

        $view = view('home',  ['message'=> 'Authors search index updated!'])->render();
        return (new Response($view));
    }
}
