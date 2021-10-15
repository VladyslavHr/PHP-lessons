<div class="admin-chat-wrap">
    <div class="admin-chat-id-name">
        <a href="?action=chats">Back to Chats</a>
        <span>chat id</span>
        <span>user name</span>
    </div>

    <div class="text-space">
        <div class="admin-user-message">
            <span>Hello admin</span>
        </div>

        <div class="admin-message">
            <span>Hello user</span>
        </div>
    </div>


    <div class="message-panel">
        <div class="admin-chat-add">
            <span><?= bi('emoji-smile') ?></span>
            <span><?= bi('plus-lg') ?></span>
            <span><?= bi('three-dots-vertical') ?></span>
        </div>
        <div class="admin-chat-message-sent">
            <textarea name="admin-chat-message-sent" maxlenght="1000" placeholder="Введите сообщение ..."></textarea>
            <button type="submit"><?= bi('arrow-right-circle') ?></button>
        </div>

    </div>


</div>