<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Album;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $direction = 'desc';
//        if($user->album_order) {
//            $album_order = $user->album_order;
//        } else {
//            $album_order = 'id';
//        }

        $items = Album::with('photos')
            ->orderBy('id', $direction)
            ->paginate(9);

        $view = view('main', ['items' => $items])->render();
        return (new Response($view));
    }
}
