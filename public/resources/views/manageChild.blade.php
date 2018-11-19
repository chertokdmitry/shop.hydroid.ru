<ul>
    @foreach($childs as $child)
        <li>
            <a href="/category/{{ $child['alias']}}"> {{ $child['title']}}</a>
            @if(array_key_exists('child', $child))

                @include('manageChild',['childs' => $child['childs']])
            @endif
        </li>
    @endforeach
