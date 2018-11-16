@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="card-deck" style="margin-bottom: 1rem;">
            @foreach ($items as $item)

                @if ($photo = $item->photos->last()) @endif

                @if (($loop->index % 3) == 0)
        </div><div class="card-deck" style="margin-bottom: 1rem;">
                @endif

                <div class="card" style="min-width: 240px;
                border-color: #fff; ">
                    <div class="card-body mr-10">
                        <img class="card-img-top" src="/public/photos/{{ $photo['url'] }}">
                        <br><br>
                        <h6 class="card-title">
                            <a href="/album/{{ $item->id }}">{{ $item->name }}</a>
                            ({{ $item->photos->count() }})
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
