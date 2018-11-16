@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            <h3>Новый альбом</h3>
        </div>
        <div>
            <br><br>
            <form method="POST" action="/albums">
                @csrf
                <label for="name">Название</label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       placeholder=" Название">
                <br><br>
                <label for="description">Описание</label>
                <input type="text"
                       class="form-control"
                       id="description"
                       name="description"
                       placeholder=" Описание">
                <br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection