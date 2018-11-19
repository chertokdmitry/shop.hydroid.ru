@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            @include('category',['items' => $categories])
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-9">
                    <div class="card-deck" style="margin-bottom: 1rem;">

                        <div class="card" style="min-width: 240px;
                border-color: #fff; ">
                            <div class="card-body mr-10">
                                <img class="card-img-top" style="max-width: 800px; max-height: 800px" src="{{ $item['image'] }}">
                                <br><br>
                                <h3 class="card-title">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="card-text">
                                    {{ $item['description'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3>Цена {{ $item['price'] }} руб</h3>
                    <h6>в наличии: {{ $item['amount'] }} шт</h6>
                </div>
            </div>
        </div>
    </div>

@endsection
