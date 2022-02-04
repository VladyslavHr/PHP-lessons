<div class="post-block">
    <div class="post-title">
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
    <div class="post-content">
        <h5>{{ $post->title }}</h3>
        <p>
            {{$post->content}}
        </p>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset ('images/banner1.jpg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset ('images/cat.jpg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset ('images/logo.jpg') }}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    <div class="post-summery">
        <div class="post-like">
            <a href="#">
                <i class="bi bi-suit-heart"></i>
                <span class="like-count">Вам и еще 110 людям это понравилось</span>
            </a>
        </div>
        <div class="post-comments">
            <a href="#">
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
</div>
