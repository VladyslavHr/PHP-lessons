<div class="container">
<form class="avatar-publish" action="{{ route('posts.store') }}" method="POST">
    @include('blocks.errors')
    @include('blocks.status')

    @csrf
    <input type="hidden" name="postable_id" value="{{ isset($group->id) ? $group->id : $user->id }} ">
    <input type="hidden" name="postable_type" value="{{ isset($group->id) ? 'App\Models\Group' : 'App\Models\User' }} ">
    <div class="publish-block">
        <img src="{{ auth()->user()->avatar }}" alt="">
        <input class="text-input" name="title" value="{{ old('title') }}" type="text" placeholder="Заголовок">
        <div class="post-status-select-wrapp">
            <label class="post-status-select">Доступ публикаций</label>
            <select name="post_status" class="post-status-choose" name="post_status">
                <option value="all">Доступно всем</option>
                <option value="privat">Доступно только подписчикам</option>
            </select>
        </div>
        <label for="post_text"></label>
        <textarea class="post-text-place" name="content" type="text" id="post_text" placeholder="Напишите что-нибудь"></textarea>
        <input name="filenames[]" multiple type="file" class="imgs-input form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <label class="form-check-label" for="">
            <input class="checkbox-style form-check-input" type="checkbox" checked>
            Разрешить комментарии
        </label>

        <button type="submit">Поделиться</button>
    </div>
</form>
</div>
