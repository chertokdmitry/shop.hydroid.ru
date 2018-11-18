
<ul id="tree1">
    @foreach($items as $category)
        <li>
            {{ $category['title'] }}
            @if(array_key_exists('childs', $category))
                @include('manageChild',['childs' => $category['childs']])
            @endif
        </li>
@endforeach