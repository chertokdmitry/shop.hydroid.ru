@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            <h3>Альбомы</h3>
        </div>

        <div>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Название</th>
                    <th>Описание</th>
                </tr>

                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <a href="/albums/view/{{ $item->id }}">
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
