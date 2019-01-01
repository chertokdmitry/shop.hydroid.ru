<?php

namespace App\Http\Controllers\Traits;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

trait CategoryTree
{
    public static function getCategories()
    {
        $tree = Cache::remember('categories', 60, function () {

            $categories = Category::all();
            $newarray = $categories->toArray();
            return self::buildTree($newarray);
        });

        return $tree;
    }

    public static function buildTree(array $elements, $parentId = 0, $level = 0)
    {
        $branch = array();
        $level_ini = $level;

        foreach ($elements as $element) {
            $level = $level_ini;
            if ($element['parent'] == $parentId) {
                $element ['level'] = $level;
                $children = self::buildTree($elements, $element['id'], ++$level);
                if ($children) {
                    $element['childs'] =  $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
}
