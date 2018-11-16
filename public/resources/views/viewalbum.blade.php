@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
           <h3>{{ $albumTitle }}</h3>
            <br>
        </div>
        <div class="alert alert-secondary" role="alert">
            <h5>Добавить фото</h5>
            <br>
            <form action="/photos" method="post" enctype="multipart/form-data">
                <input type="hidden" name="album" value="{{ $album }}">
                @csrf
                Выберите файл:
                <input type="file" name="userfile" id="userfile">
                <br><br>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       placeholder=" Название">
                <br><br>
                <input type="submit" value="Загрузить" name="submit">
            </form>
        </div>
        <br>
        <br>
            <div class="card-deck" style="margin-bottom: 1rem">
                @foreach ($items as $item)
                    <div class="card" style="min-width: 240px;">
                        <div class="card-body mr-10">
                            <img class="card-img-top" src="/public/photos/{{ $item['url'] }}">
                            <br><br>
                            <h6 class="card-title">
                                <a href="/video/{{ $item['id'] }}">{{ $item['name'] }}</a>
                            </h6>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
@endsection
