<form class="avatar-publish" action="" method="POST">
    <div class="publish-block">
        <img src="{{ asset ('images/cat.jpg') }}" alt="">
        <input type="text" placeholder="Заголовок">
        <label class="post-status-select">Доступ публикаций</label>
        <select class="post-status-choose" name="post_status">
            <option value="0">Выберите доступ</option>
            <option value="1">Доступно всем</option>
            <option value="2">Доступно только подписчикам</option>
        </select>
        <label for="post_text"></label>
        <textarea class="post-text-place" name="publish_text" type="text" id="post_text" placeholder="Напишите что-нибудь"></textarea>
        <button type="submit">Поделиться</button>
    </div>
</form>
