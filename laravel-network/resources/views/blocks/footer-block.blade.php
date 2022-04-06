<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <!-- Default dropup button -->
            <div class="btn-group dropup footer-search-block">
                <input type="search" class="dropdown-toggle footer-search-input" data-bs-toggle="dropdown" aria-expanded="false" placeholder="Search your friend">
                <button>
                    <i class="bi bi-search"></i>
                </button>
                <div class="dropdown-menu footer-search-menu">
                    <div class="footer-search-menu-head row align-items-center">
                        <a href="#" class="footer-search-settings col-sm-3 text-center">
                            <i class="bi bi-gear"></i>
                        </a>
                        <div class="footer-search-title col-sm-6 text-center">
                            <h5>Search friends</h5>
                        </div>
                        <div class="footer-search-close col-sm-3 text-center" aria-expanded="false">
                            <i class="bi bi-x-lg"></i>
                        </div>
                    </div>
                @foreach (auth()->user()->friends as $user)
                    <div class="footer-user-list">
                        <a href="#" class="footer-user-link">
                            <div class="footer-user-avatar-search col-sm-2">
                                <img src="{{ $user->avatar }}" alt="">
                            </div>
                            <div class="footer-user-name col-sm-10">{{ $user->name }}</div>
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            {{-- <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false"> --}}
                    <div class="scrolling-carousel">
                        @foreach (auth()->user()->friends as $user)
                        <div class="scrolling-carousel-item">
                                <div class="footer-user-avatar-block">
                                    <a href="#">
                                        <img src="{{ $user->avatar }}" alt="">
                                    </a>

                                </div>
                        </div>
                        @endforeach
                    </div>

                {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button> --}}
            {{-- </div> --}}
        </div>
        <div class="col-sm-3">
            <form class="footer-message-block d-flex" onsubmit="send_message(this, event)">
                <input {{-- name="{{ auth()->user()->name }}" --}} id="chat_input" class="footer-textarea col-sm-10" type="text" placeholder="text message" autocomplete="off">
                <button class="col-sm-2 footer-textarea-button" type="submit">
                    Send
                    {{-- <i class="bi bi-send-fill"></i> --}}
                </button>

                <div class="chat-messages" style="display: none;">
                    <div class="footer-search-menu-head row align-items-center">
                        <div class="footer-search-title col-sm-8 ps-4">
                           {{ auth()->user()->name }}

                        </div>
                        <a href="#" class="footer-search-settings col-sm-2 text-center">
                            <i class="bi bi-gear"></i>
                        </a>
                        <div class="footer-search-close col-sm-2 text-center" aria-expanded="false">
                            <i class="bi bi-x-lg"></i>
                        </div>
                    </div>

                    <div class="messages-list" id="messages_list">
                        <div class="message-date">
                            <div class="message-date-content">{{ date('d-F') }}</div>
                        </div>
                        {{-- <div class="message my">
                            <div class="msg-head">
                                <div class="msg-user">User name</div>
                                <div class="message-time">{{ date('H:i') }}</div>
                            </div>
                        </div>
--}}
                        <div class="message not-my">
                            <div class="msg-head">
                                <div class="msg-user">System</div>
                                <div class="message-time">{{ date('d-m-y H:i') }}</div>
                            </div>
                            Wellcome
                        </div>

                    </div>
                </div>
            </form>



        </div>
    </div>
</div>

<template id="chat_message_tpl">
    <div class="message {msg_class}">
        <div class="msg-head">
            <div class="msg-user elipsis">user_name</div>
            <div class="message-time">{date}</div>
        </div>
        {message}
    </div>
</template>

<script>

function start_chat() {

    $('#chat_input').focus(function(){
        // document.body.classList.remove('ajax_loader')
        $('.chat-messages').css('display', 'block')
    })

    $('body').on('click', function(e){
        if ($(e.target).closest('.footer-search-close').length)
        {
            $('.chat-messages').css('display', 'none')
        }

        if (!$(e.target).closest('.footer-message-block').length && !$('#chat_input:focus').length)
        {
            $('.chat-messages').css('display', 'none')
        }

    })

    return false

    // Создаёт WebSocket - подключение.
    const socket = new WebSocket('ws://localhost:2346');

    if(socket.readyState === 3) {
        return false
    }

    // Соединение открыто
    socket.addEventListener('open', function (event) {
        // socket.send('Hello Server!');
        socket.send(JSON.stringify({
            s: 'new',
            u: auth_user.name
        }));
    });

    // Наблюдает за сообщениями
    socket.addEventListener('message', function (event) {
        // console.log('Message from server ', event.data);

        var data = JSON.parse(event.data)

// compare my user name and message username
        if(data.id === auth_user.id){
            var is_my_class = (data.id === auth_user.id) ? 'my' : 'not-my'
        }

        var messages_list = document.getElementById('messages_list')
        var message_html = $('#chat_message_tpl').html()
        .replace('{msg_class}', is_my_class)
        .replace('user_name', data.u)
        .replace('{date}', now_date )
        .replace('{message}', data.m)
        $(messages_list).append(message_html)
        messages_list.scrollTop = messages_list.scrollHeight;
    });





    var counter = 1
    window.send_message = function (form, event) {
        event.preventDefault()


        // var user = $('#chat_input').attr('name')
        // var message = $('#chat_input').val()




        var data = {
            s: 'msg',
            id: auth_user.id,
            u: auth_user.name,
            m: $('#chat_input').val()
        }

        $('#chat_input').val('') // reset input
        socket.send(JSON.stringify(data));
        var messages_list = document.getElementById('messages_list')

        var message_html = $('#chat_message_tpl').html()
        .replace('{msg_class}', 'my')
        .replace('user_name', data.u)
        .replace('{date}', now_date )
        .replace('{message}', data.m)
        $(messages_list).append(message_html)
        messages_list.scrollTop = messages_list.scrollHeight;



    }

    function now_date() {
        var date = new Date
        return date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear() + ' ' + date.getHours() + ':' + (date.getMinutes() < 10 ? '0' : '') + date.getMinutes()
    }


}

start_chat()




</script>
