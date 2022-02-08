<div class="post-block">
    <div class="post-header">
        <div class="user-image">
            <img src="{{ $user->avatar }}" alt="">
        </div>
        <div class="user-info">
            <span class="user-name">{{ $user->name }}</span>
            <span class="post-time">{{ $post->date_formated() }}</span>
        </div>
        <div class="post-set-bar">
            <a href="#"><i class="bi bi-list"></i></a>
        </div>
    </div>
    <div class="post-slider">

        <div id="post_slider{{ $post->id }}" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                @foreach ($post->images() as $key => $post_image)
                <button type="button" data-bs-target="#post_slider{{ $post->id }}" data-bs-slide-to="{{ $key }}" class="{{ $key === 0 ? 'active' : '' }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
            @foreach ($post->images() as $key => $post_image)
              <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                {{-- <img src="{{ $post_image }}" class="d-block w-100" alt="..."> --}}
                <div class="post-image" style="background-image: url('{{ $post_image }}')"></div>
              </div>
            @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#post_slider{{ $post->id }}" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#post_slider{{ $post->id }}" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    <div class="post-summary">
        <div class="post-like">
            <a href="#" title="Вам и еще 110 людям это понравилось">
                <i class="bi bi-suit-heart" ></i>
                <span class="like-count">110</span>
            </a>
        </div>
        <div class="post-comments">
            <a href="#" class="collapsed"  data-bs-toggle="collapse" data-bs-target="#collapse{{ $post->id }}">
                <i class="bi bi-chat-dots"></i>
                <span  class="count">20</span>
            </a>
        </div>
        <div class="post-share">
            <a href="#">
                <i class="bi bi-share"></i>
                <span class="count">6</span>
            </a>
        </div>
    </div>
    <div class="post-body">
        <h5 class="post-title">{{ $post->title }}</h3>
            <p class="post-content">
                {{$post->content}}
            </p>
    </div>
    {{-- comments --}}
    <div class="accordion" id="post_comments{{ $post->id }}">
        <div class="accordion-item">
          <div id="collapse{{ $post->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#post_comments{{ $post->id }}">
            <div class="accordion-body">
              <div class="accordion-comments-list">
                <div class="accordion-user-info-ava row">
                    <div class="accordion-user-avatar col-sm-1">
                        <img src="{{ $user->avatar }}" alt="">
                    </div>
                    <div class="accordion-user-name col-sm-9">
                        {{-- {{ $user->name }} --}}
                        Владислав Гребенников
                    </div>
                    <div class="accordion-user-time col-sm-2">
                        time
                    </div>
                </div>
                <div class="accordion-comment-text">
                    comment
                </div>
              </div>
              <div class="accordion-comments-list">
                <div class="accordion-user-info-ava row">
                    <div class="accordion-user-avatar col-sm-1">
                        <img src="{{ $user->avatar }}" alt="">
                    </div>
                    <div class="accordion-user-name col-sm-9">
                        {{-- {{ $user->name }} --}}
                        Владислав Гребенников
                    </div>
                    <div class="accordion-user-time col-sm-2">
                        time
                    </div>
                </div>
                <div class="accordion-comment-text">
                    comment
                </div>
              </div>
              <div class="accordion-comments-list">
                <div class="accordion-user-info-ava row">
                    <div class="accordion-user-avatar col-sm-1">
                        <img src="{{ $user->avatar }}" alt="">
                    </div>
                    <div class="accordion-user-name col-sm-9">
                        {{-- {{ $user->name }} --}}
                        Владислав Гребенников
                    </div>
                    <div class="accordion-user-time col-sm-2">
                        time
                    </div>
                </div>
                <div class="accordion-comment-text">
                    comment
                </div>
              </div>
              <div class="accordion-comments-list">
                <div class="accordion-user-info-ava row">
                    <div class="accordion-user-avatar col-sm-1">
                        <img src="{{ $user->avatar }}" alt="">
                    </div>
                    <div class="accordion-user-name col-sm-9">
                        {{-- {{ $user->name }} --}}
                        Владислав Гребенников
                    </div>
                    <div class="accordion-user-time col-sm-2">
                        time
                    </div>
                </div>
                <div class="accordion-comment-text">
                    comment
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    {{-- comments --}}

    {{-- add comments --}}
    <form action="{{ route('comments.store') }}" class="row add-comments-wrap">
        <a href="#" class="col-sm-1 add-comments-smile">
            <i class="bi bi-emoji-smile add-comments-smiles"></i>
        </a>
        <div class="col-sm-8 add-comments-text">
            <input class="add-comments-text-input text-truncate" type="text" name="" id="" placeholder="Добавьте комментарий...">
        </div>
        <div class="col-sm-3 add-comments-btn">
            <button class="add-comments-send" type="submit">Опубликовать</button>
        </div>
    </form>
    {{-- add comments --}}
</div>
