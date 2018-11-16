<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;
use App\Photo;

class AlbumsResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        $view = view('albums', ['items' => $albums])->render();
        return (new Response($view));
    }

    public function view($id)
    {
        $albumInfo = Album::find($id);

        $photos = [];
        $result = Photo::where('album_id', $id)->get();

        foreach ($result as $photo) {
            $photos[] = ['id' => $photo->id,
                'name' => $photo->name,
                'url' => $photo->url];
        }

        $view = view('viewalbum', [
            'items' => $photos,
            'album' => $id,
            'albumTitle' => $albumInfo->name])->render();

        return (new Response($view));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (new Response(view('createalbum')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Album;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
