@foreach ($names as $name)
    {{-- @php $name = $user->name.' '.$user->last_name @endphp --}}
    <li class="result-item" title="{{ $name->name }}"><a href="/names/show/{{ $name->id }}">{{ $name->name }}</a></li>
@endforeach
