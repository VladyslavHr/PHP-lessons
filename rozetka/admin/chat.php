<style>
    html,
    body,
    .admin-main-content{
        height: 100%;
    }
</style>

<div class="admin-chat-wrap">
    <div class="admin-message-wrap">
        <div class="admin-chat-id-name">
            <span>chat name</span>
            <span>user name</span>
        </div>

        <div class="text-space" id="chat_messages">
            <h3 class="text-center"> Choose chat </h3>
        </div>


        <div class="message-panel">
            <div class="admin-chat-add">
                <span><?= bi('emoji-smile') ?></span>
                <span><?= bi('plus-lg') ?></span>
                <span><?= bi('three-dots-vertical') ?></span>
            </div>
            <form class="admin-chat-message-sent" id="admin_chat_message_form">
                <input disabled id="admin_chat_input" name="admin-chat-message-sent" maxlenght="1000" placeholder="Введите сообщение ..."></input>
                <button type="submit"><?= bi('arrow-right-circle') ?></button>
            </form>

        </div>
    </div>



    <div class="chats-list">
        <div class="chat-list-search">
            <input type="search" placeholder="Найти чат">
            <button type="submit">Поиск</button>
        </div>

        <?php

            $chats = db_query("SELECT * FROM chat_dialogs order by id desc")

        ?>

        <div class="user-chats-wrapp" id="chats_list">

            <?php foreach ($chats as $chat): ?>
            <div class="chat-link cursor-pointer" data-chatid="<?= $chat['id'] ?>">
                <div class="message-name">
                    <img src="img/solar-flare.en.png" alt="">
                </div>
                <div class="chat-user-info">
                    <span class="chat-user-name"><?= $chat['user_name'] ?></span> 
                    <div class="message-and-time">
                        <span class="chat-user-last-message">HEllo</span>
                        <span class="message-time"><?= $chat['created_at']  ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach ?> 
        </div>

    <script>
        var log = console.log
        // Загрузка списка чата
        var chatId // undefined
        $('#chats_list').on('click', '.chat-link', function(event) {
            $('#chat_messages').html('')
            chatId = this.dataset.chatid
            load_messages(chatId)
            
            setInterval(function() {
	            load_messages(chatId);
            }, 5000);
        })

        function load_messages(chatId) {
            $.post(location.href, 
                {get_chat_messages: 1, chatId: chatId},
                function(data) {
                    $('#admin_chat_input').attr('disabled', false).focus()
                    $('#chat_messages').html('')
                    data.messages.forEach(function(element){
                        $('#chat_messages').append('<div class="'+ element.from +'-message"><span>' + element.message + '</span></div>')
                    })
                }, 'json')
        }






         // Отправка сообщения
        $('#admin_chat_message_form').on('submit', function(event){
            event.preventDefault()
            
            if(!chatId) return false
            const admin_chat_input = $('#admin_chat_input')
            const message = admin_chat_input.val()
            admin_chat_input.val('')
            $.post(location.href, 
                {admin_chat_send_message:1, chatId, message},
                function(data){
                    admin_chat_input.val('')
                    if (data.status && data.status === 'ok') {
                        $('#chat_messages').append('<div class="admin-message"><span>' + message + '</span></div>')
                    }
                    
            }, 'json')
        })
    </script>

        
    </div>


</div>