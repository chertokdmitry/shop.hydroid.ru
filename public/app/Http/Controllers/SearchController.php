<?php

namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Http\Controllers\Traits\CategoryTree;

class SearchController extends Controller
{
    public function getSearch(Request $request)
    {
        $data = $request->all();
        $data['table'] = 'products';

        if($data['table'] == 'products') {

            $match = [
                'query' => [
                    'multi_match' => [
                        'query' => $data['query'],
                        'fields' => ['title', 'description']
                    ]
                ]
            ];

            $ids = $this->getSearchResult($data['table'], $match);

            $items = $this->getProducts($ids);
        }

        $categories = CategoryTree::getCategories();

        $view = view('main', ['items' => $items,
            'header' => 'Результаты поиска: ' . $data['query'],  'categories' => $categories])->render();

        return (new Response($view));
    }

    public function notFoundView($query)
    {
        $view = view('notfound', ['header' => 'Результаты поиска: ' . $query])->render();

        return (new Response($view));
    }

    public function getSearchResult($table, $match)
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => $table,
            'type' => 'all',
            'body' => $match
        ];

        $response = $client->search($params);

        return $response['hits']['hits'];
    }

    public function getProducts($items)
    {
        foreach ($items as $item){
            $ids[] = $item['_source']['id'];
        }

        return Product::whereIn('id', $ids)->paginate(21);
    }
}