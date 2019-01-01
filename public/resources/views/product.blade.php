@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: 100px">
        <div class="col" style="margin-left:30px;">
            @include('category',['items' => $categories])
        </div>
        <div class="col-9"  style="">
                        <div class="card" style="min-width: 240px; width: 90%">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{ $item['title'] }}
                                </h3>
                            </div>
                            <div class="card-body mr-10">
                                <img class="card-img-top" style="max-width: 800px; max-height: 800px" src="{{ $item['image'] }}">


                                <p class="card-text">
                                    {{ $item['description'] }}
                                </p>
                            </div>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><h3>Цена {{ $item['price'] }} руб</h3></li>
                                <li class="list-group-item"><h6>в наличии: {{ $item['amount'] }} шт</h6></li>
                                <li class="list-group-item">

                                    <a href="#" class="btn btn-success btn-lg btn-block">Купить</a>

                                </li>
                            </ul>

                        </div>
        </div>
    </div>
    <br><br>
    <br><br>
@endsection
