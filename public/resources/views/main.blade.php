@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col">
                @include('category',['items' => $categories])
            </div>
            <div class="col-9">
                <div class="card-deck" style="margin-bottom: 1rem;">
                @foreach ($items as $item)
                    <div class="card" style="min-width: 240px;
                border-color: #fff; ">
                        <div class="card-body mr-10">
                            <img class="card-img-top" style="max-width: 300px" src="{{ $item['image'] }}">
                            <br><br>
                            <h6 class="card-title">
                            <a href="/album/{{ $item['id'] }}">{{ $item['title'] }}</a>
                            </h6>
                            <p class="card-text">
                            </p>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
    {{ $items->links() }}
@endsection
