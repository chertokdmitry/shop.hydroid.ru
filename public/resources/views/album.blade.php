@extends('layouts.app')

@section('content')
    <h3>{{ $title }}</h3>
    {{ $date }}
    <div class="content">
        <div class="card-deck" style="margin-bottom: 1rem;">
            @foreach ($items as $item)
                <div class="modal fade"
                     id="image{{$loop->index}}" tabindex="-1"
                     role="dialog"
                     aria-labelledby="exampleModalCenterTitle"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <img class="card-img-top" src="/public/photos/{{ $item->url }}">
                        </div>
                    </div>
                </div>
                @if (($loop->index % 4) == 0)
        </div><div class="card-deck" style="margin-bottom: 1rem;">
                @endif

            <div class="card" style="min-width: 240px;
                border-color: #fff; ">
                <div class="card-body mr-10">
                    <a href="#image{{$loop->index}}" data-toggle="modal" data-target="#image{{$loop->index}}">
                        <img class="card-img-top" src="/public/photos/{{ $item->url }}">
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{ $items->links() }}
@endsection
