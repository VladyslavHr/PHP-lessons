
    {{ $object->posts_paginated->links() }}
    <div class="publishing" id="post_list">
        @foreach ($object->posts_paginated as $post_key => $post)
        @include('blocks.post-block')
        @endforeach
    </div>
    {{ $object->posts_paginated->links() }}

