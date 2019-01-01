@extends('layouts.app')

@section('content')
                <div class="row"  style="margin-top: 100px; margin-left: 20px">
                    <div class="col position-fixed">
                        @include('category',['items' => $categories])
                    </div>
                    <div class="col-9" style="margin-left: 280px">

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
                        <div class="card mb-4 shadow-sm" style="height: 360px;">
                            <div class="card-body" >
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#image0" data-toggle="modal" data-target="#image0">
                                        <img class="card-img-top" src="{{ $item['image'] }}" style="max-width: 300px; max-height: 240px">
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="/product/{{ $item['id'] }}">
                                    {{ $item['title'] }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                            </div>
                        {{ $items->links() }}
                    </div>
                </div>


@endsection