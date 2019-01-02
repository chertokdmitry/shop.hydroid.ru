@extends('crm.main')

@section('content')
    <div class="row"  style="margin-top: 100px; margin-left: 20px">


            {{ $items->links() }}
            <div class="row" style="width: 90%">
                @foreach ($items as $item)

                    <div class="modal fade"
                         id="image0" tabindex="-1"
                         role="dialog"
                         aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <img class="card-img-top" src="{{ $item['image'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm" style="height: 580px;">
                            <div class="card-body" >
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#image0" data-toggle="modal" data-target="#image0">
                                        <img class="card-img-top" src="{{ $item['image'] }}" style="max-width: 300px; max-height: 300px">
                                    </a>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $item['title'] }}</li>
                                <li class="list-group-item">Цена {{ $item['price'] }} руб</li>
                                <li class="list-group-item">в наличии: {{ $item['amount'] }} шт</li>
                                <li class="list-group-item">
                                    <a href="#" class="btn btn-success">Опубликовать</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $items->links() }}

    </div>


@endsection