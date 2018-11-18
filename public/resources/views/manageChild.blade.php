<ul>
    @foreach($childs as $child)
        <li>
            {{ $child['title']}}
            @if(array_key_exists('child', $child))
                @include('manageChild',['childs' => $child['childs']])
            @endif
        </li>
    @endforeach
</ul>