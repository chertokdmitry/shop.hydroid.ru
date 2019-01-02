
@if(request()->route()->getActionMethod() == 'main'
    OR
    request()->route()->getActionMethod() == 'homecategory')
    @php($path = '/home/category')
    @else
    @php($path = '/category')
@endif

<ul id="tree1">
    @foreach($items as $category)
        <li>
            <a href="{{ $path }}/{{ $category['alias'] }}">{{ $category['title'] }}</a>
            @if(array_key_exists('childs', $category))
                @include('manageChild',['childs' => $category['childs']])
            @endif
        </li>
</ul>
@endforeach