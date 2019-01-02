
@if(request()->route()->getActionMethod() == 'main'
    OR
    request()->route()->getActionMethod() == 'homecategory')
    @php($path = '/home/category')
@else
    @php($path = '/category')
@endif

<ul>
    @foreach($childs as $child)
        <li>
            <a href="{{ $path }}/{{ $child['alias']}}"> {{ $child['title']}}</a>
            @if(array_key_exists('child', $child))

                @include('manageChild',['childs' => $child['childs']])
            @endif
        </li>
    @endforeach
