@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col"  style="margin-left:20px;">
                @include('category',['items' => $categories])
            </div>
            <div class="col-9">
                {{ $items->links() }}
                <div class="card-deck" style="margin-bottom: 1rem;">
                @foreach ($items as $item)
                    <div class="card" style="min-width: 240px;
                border-color: #fff; ">
                        <div class="card-body mr-10">
                            <a href="/product/{{ $item['id'] }}">
                                <img class="card-img-top" border=0 style="max-width: 240px; max-height: 240px" src="{{ $item['image'] }}"></a>
                            <br><br>
                            <h6 class="card-title">
                            <a href="/product/{{ $item['id'] }}">{{ $item['title'] }}</a>
                            </h6>
                            <p class="card-text">
                            </p>
                        </div>
                    </div>
                @endforeach
                </div>
                {{ $items->links() }}
            </div>
@endsection
