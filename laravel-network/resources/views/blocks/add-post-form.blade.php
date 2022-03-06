<div class="post-publish">
    <div class="accordion" id="add_post_collapse">



        <button class="accordion-button collapsed" type="button"
            data-bs-toggle="collapse" data-bs-target="#collapse_post_form"
            aria-expanded="false" aria-controls="collapse_post_form">
            <img src="{{ auth()->user()->avatar }}" alt="">
            Add post
        </button>
        <div id="collapse_post_form" class="accordion-collapse collapse"
            aria-labelledby="headingOne" data-bs-parent="#add_post_collapse">

                <form class="post-publish-form" action="{{ route('posts.store') }}" enctype='multipart/form-data' method="POST" onsubmit="add_post(this, event)">

                    @csrf
                    <input type="hidden" name="postable_id" value="{{ $postable_id }}">
                    <input type="hidden" name="postable_type" value="{{ $postable_type }}">
                    <div class="publish-block row">
                        <div class="col-12">
                            <input class="text-input" name="title" value="{{ old('title') }}" type="text" placeholder="Заголовок">
                        </div>

                        <div class=" col-sm-12 ">
                            <div class="post-status-select-wrapp">
                                <label class="post-status-select">Доступ публикаций</label>
                                <select name="post_status" class="post-status-choose" name="post_status">
                                    <option value="public">Доступно всем</option>
                                    <option value="protected">Доступно только подписчикам</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 ">
                            <textarea class="post-text-place" name="content" type="text" id="post_text" placeholder="Напишите что-нибудь">{{old('content')}}</textarea>
                        </div>
                        <div class="col-sm-12 ">
                            <input name="images[]" multiple type="file" class="imgs-input form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                        <div class="col-sm-12 ">
                            <label class="form-check-label">
                            <input name="allow_comments" value="1" class="checkbox-style form-check-input" type="checkbox" checked>
                                Разрешить комментарии
                            </label>

                            <button type="submit">Поделиться</button>
                        </div>

                    </div>
                </form>

        </div>

    </div>

</div>
