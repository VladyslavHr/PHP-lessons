@if(count($users))
    <li class="search-autocomplete-title"><small>users</small></li>
@endif

@foreach ($users as $user)
    @php $name = $user->name.' '.$user->last_name @endphp
    <li class="result-item" title="{{ $name }}"><a href="/profile/{{ $user->id }}">{{ $name }}</a></li>
@endforeach



@if(count($groups))
    <li class="search-autocomplete-title"><small>groups</small></li>
@endif



@foreach ($groups as $group)
    <li class="result-item" title="{{ $group->name }}"><a href="/groups/{{ $group->id }}">{{ $group->name }}</a></li>
@endforeach



@if (count($users) || count($groups))
    <li class="result-item more-results" title=" More Results "><a href="/profiles/search?query={{ request('query') }}">More Results</a></li>
@endif
