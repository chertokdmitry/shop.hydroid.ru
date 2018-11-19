<?php

namespace App\Http\Controllers;

class CategoryTreeController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        $newarray = $categories->toArray();
        $tree = $this->buildTree($newarray);

        return $tree;
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
