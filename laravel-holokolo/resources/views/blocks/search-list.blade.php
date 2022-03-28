 {{-- dropdown result of search lis --}}


@foreach ($names as $name)
    <li class="result-item" title="{{ $name->name }}"><a href="/names/show/{{ $name->id }}">{{ $name->name }}</a></li>
@endforeach
