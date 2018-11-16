@extends('layouts.app')

@section('content')
    <div class="content">
    <h3>Настройки</h3>
        <div class="alert alert-secondary" role="alert">
            <br>
            <form action="/save" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Показ альбомов:</legend>
                    <div>
                        <input type="radio" id="1"
                               name="albums" value="updated_at"
                               @if($album_order == 'updated_at')
                               checked
                               @endif/>
                        <label for="1">по новизне</label>
                    </div>
                    <div>
                        <input type="radio" id="2"
                               name="albums" value="name"
                               @if($album_order == 'name')
                               checked
                                @endif/>
                        <label for="2">по алфавиту</label>
                    </div>
                    <div>
                        <input type="radio" id="3"
                               name="albums" value="id"
                               @if($album_order == 'id')
                               checked
                                @endif/>
                        <label for="3">по ID</label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Показ фото в альбомах:</legend>
                    <div>
                        <input type="radio" id="4"
                               name="photos" value="created_at"
                               @if($photo_order == 'created_at')
                               checked
                                @endif/>
                        <label for="4">по новизне</label>
                    </div>
                    <div>
                        <input type="radio" id="5"
                               name="photos" value="name"
                               @if($photo_order == 'name')
                               checked
                                @endif/>
                        <label for="5">по алфавиту</label>
                    </div>
                    <div>
                        <input type="radio" id="6"
                               name="photos" value="id"
                               @if($photo_order == 'id')
                               checked
                                @endif/>
                        <label for="6">по ID</label>
                    </div>
                </fieldset>
                <input type="submit" value="Сохранить" name="submit">
            </form>
        </div>
    </div>

@endsection
