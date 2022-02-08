
<form class="avatar-publish" action="{{ route('posts.store') }}" enctype='multipart/form-data' method="POST">

    @csrf
    <input type="hidden" name="postable_id" value="{{ $postable_id }}">
    <input type="hidden" name="postable_type" value="{{ $postable_type }}">
    <div class="publish-block row">
        <div class="col-2">
            <img src="{{ auth()->user()->avatar }}" alt="">
        </div>
        <div class="col-10">
            <input class="text-input" name="title" value="{{ old('title') }}" type="text" placeholder="Заголовок">
        </div>

        <div class=" col-sm-10 offset-sm-2">
            <div class="post-status-select-wrapp">
                <label class="post-status-select">Доступ публикаций</label>
                <select name="post_status" class="post-status-choose" name="post_status">
                    <option value="all">Доступно всем</option>
                    <option value="privat">Доступно только подписчикам</option>
                </select>
            </div>
        </div>
        <div class="col-sm-10 offset-sm-2">
            <textarea class="post-text-place" name="content" type="text" id="post_text" placeholder="Напишите что-нибудь">{{old('content')}}</textarea>
        </div>
        <div class="col-sm-10 offset-sm-2">
            <input name="images[]" multiple type="file" class="imgs-input form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        </div>
        <div class="col-sm-10 offset-sm-2">
            <label class="form-check-label">
            <input name="allow_comments" value="1" class="checkbox-style form-check-input" type="checkbox" checked>
                Разрешить комментарии
            </label>

            <button type="submit">Поделиться</button>
        </div>

    </div>
</form>

