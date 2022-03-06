


<div class="post-block" id="post_{{ $post->id }}">
    <div class="post-header">
        <div class="user-image">
            <img src="{{ $post->author->avatar }}" alt="">
        </div>
        <div class="user-info">
            <span class="user-name">{{ $post->author->name }}</span>
            <span class="post-time">{{ $post->date_formated() }}</span>
        </div>
        <div class="post-set-bar">
            <div class="btn-group">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                      <button class="dropdown-item" style="color: red" onclick="delete_post(this)" data-postid={{ $post->id }}>
                        Delete post <i class="bi bi-trash"></i>
                        </button></li>
                </ul>
              </div>
        </div>


    </div>
    <div class="post-slider">

        <div id="post_slider{{ $post->id }}" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                @foreach ($post->post_images as $post_image_key => $post_image)
                <button type="button" data-bs-target="#post_slider{{ $post->id }}" data-bs-slide-to="{{ $post_image_key }}" class="{{ $post_image_key === 0 ? 'active' : '' }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
            @foreach ($post->post_images as $post_image_key => $post_image)
              <div class="carousel-item {{ $post_image_key === 0 ? 'active' : '' }}">
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
                <span class="count">110</span>
            </a>
        </div>
        <div class="post-comments">
            <a href="#" class="collapsed"  data-bs-toggle="collapse" data-bs-target="#collapse_{{ $post->id }}">
                <i class="bi bi-chat-dots"></i>
                <span  class="count comments-count">{{ $post->comments_count }}</span>
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
    @if ($post->allow_comments)

    <div class="accordion" id="post_comments_{{ $post->id }}">
        <div class="accordion-item">
            {{-- add class show to comments list {{ $post_key === 0 ? 'show' : ''}} --}}
          <div id="collapse_{{ $post->id }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#post_comments_{{ $post->id }}">
            <div class="accordion-body js-comments-list">

                @foreach ($post->comments as $comment_key => $comment)
                 @include('blocks.comment-block')
                @endforeach

            </div>
          </div>
        </div>
      </div>
    {{-- comments --}}

    {{-- add comments --}}
    <form action="{{ route('comments.store') }}" class="row add-comments-wrap" method="POST" onsubmit="add_comment(this, event)">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <a href="#" class="col-sm-1 add-comments-smile">
            <i class="bi bi-emoji-smile add-comments-smiles"></i>
        </a>
        <div class="col-sm-8 add-comments-text">
            <input class="add-comments-text-input text-truncate js-comment-input" type="text" name="text"
            placeholder="Добавьте комментарий..." autocomplete="off">
        </div>
        <div class="col-sm-3 add-comments-btn">
            <button class="add-comments-send" type="submit" disabled>Опубликовать</button>
        </div>
    </form>
    {{-- add comments --}}
    @endif {{-- allow comments --}}
</div>

