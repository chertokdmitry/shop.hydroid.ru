<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Photo;
use App\Album;
use Illuminate\Support\Facades\Auth;

class PhotosController extends Controller
{
    public function index($id)
    {
        $direction = 'desc';
        $user = Auth::user();

        $album = Album::find($id);
        $items = Photo::where('album_id', $id)
            ->orderBy('id', $direction)
            ->paginate(8);

        $view = view('album', ['items' => $items, 'title' => $album->name, 'date' => $album->created_at])->render();
        return (new Response($view));
    }
}
