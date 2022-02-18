<div class="accordion-comment">
    <div class="accordion-user-info-ava row">
        <div class="accordion-user-avatar col-2">
            <img src="{{ $comment->user->avatar . '?rand=' . rand()}}" alt="">
        </div>
        <div class="accordion-user-name col-7">
            {{ $comment->user->name }}
        </div>
        <div class="accordion-user-time col-3">
            {{  $comment->created_at->format('d-m-Y H:i') }}
        </div>
    </div>
    <div class="accordion-comment-text">
            {{ $comment->text }}
    </div>
</div>
