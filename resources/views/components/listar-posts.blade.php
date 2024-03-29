<div>
  @if (count($posts) > 0 && $posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 container-posts">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', [
                    'post' => $post,
                    'user' => $post->user
                ]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->image }}" alt="'Imagen del post' {{ $post->title }}">
                </a>
            </div>
        @endforeach
    </div>

    <div class="my-10">
        {{ $posts->links('pagination::tailwind') }}
    </div>
  @else
    <p class="text-center">No hay posts</p>
  @endif
</div>