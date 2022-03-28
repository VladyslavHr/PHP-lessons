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
                <input id="chat_input" class="footer-textarea col-sm-10" type="text" placeholder="text message" autocomplete="off">
                <button class="col-sm-2 footer-textarea-button" type="submit">
                    Send
                    {{-- <i class="bi bi-send-fill"></i> --}}
                </button>

                <div class="chat-messages">
                    <div class="footer-search-menu-head row align-items-center">
                        <div class="footer-search-title col-sm-8 text-center">
                            <a href="{{ route('profiles.show', $user->id) }}" class="messages_user_info">
                                <div class="message_user-avatar">
                                    <img src="{{ $user->avatar }}" alt="">
                                </div>
                                <div class="message_user_name">{{ $user->name }}</div>
                                <div class="message_user_status">Online</div>
                            </a>

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
                            <div class="message-date-content">{{ $message_date }}</div>
                        </div>
                        <div class="message my">
                            Me
                            <div class="message-time my">{{ $message_time }}</div>
                        </div>

                        <div class="message not-my">
                            User
                            <div class="message-time not-my">{{ $message_time }}</div>
                        </div>

                    </div>
                </div>
            </form>



        </div>
    </div>
</div>


<script>
    // Создаёт WebSocket - подключение.
const socket = new WebSocket('ws://localhost:2346');

// Соединение открыто
socket.addEventListener('open', function (event) {
    socket.send('Hello Server!');
});

// Наблюдает за сообщениями
socket.addEventListener('message', function (event) {
    // console.log('Message from server ', event.data);

    var messages_list = document.getElementById('messages_list')
    $(messages_list).append(`<div class="message not-my">${event.data}</div>`)
    messages_list.scrollTop = messages_list.scrollHeight;
});

var counter = 1
function send_message(form, event) {
    event.preventDefault()
    var message = $('#chat_input').val()
    socket.send(message);
    $(messages_list).append(`<div class="message my">${message}</div>`)
}
</script>
