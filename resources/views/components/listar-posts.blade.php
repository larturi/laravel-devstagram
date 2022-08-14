<div>
  @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6">
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
    <p class="text-center">No hay posts. Sigue a alguien para poder ver sus posts.</p> 
  @endif
</div>