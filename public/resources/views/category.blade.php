
<ul id="tree1">
    @foreach($items as $category)
        <li>
            <a href="/category/{{ $category['alias'] }}">{{ $category['title'] }}</a>
            @if(array_key_exists('childs', $category))
                @include('manageChild',['childs' => $category['childs']])
            @endif
        </li>
</ul>
@endforeach