<div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition-all duration-300 h-full flex flex-col">
    <img src="{{ asset('storage/' . $post->banner) }}" alt="Imagen de {{ $post->title }}"
        class="w-full aspect-video object-cover object-center bg-amber-600">
        <hr>
    <div class="pt-3 px-4 flex-grow">
        <div class="flex items-center gap-2 mb-2 justify-between">
            <a href="{{ route('blog.category', ['category' => $post->category->slug]) }}"
                class="text-xs bg-amber-100 text-amber-600 font-semibold px-2 py-1 rounded">
                {{ $post->category->name }}
            </a>
        </div>
        <a href="{{ route('blog.show', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
            <h2 class="text-xl font-bold text-amber-600 mb-2">{{ $post->title }}</h2>
            <p class="text-gray-700 text-sm mb-2 flex-grow">{{ $post->excerpt }}</p>
            <span class="text-amber-600 font-semibold no-underline">
                Leer más <i class="fas fa-long-arrow-alt-right"></i>
            </span>
        </a>
        <div class="flex flex-wrap gap-2 my-2">
            @foreach ($post->tags as $tag)
                <a href="{{ route('blog.tag', ['tag' => $tag->slug]) }}"
                    class="text-xs bg-amber-100 text-amber-600 font-medium px-2 py-1 rounded">
                    <i class="fas fa-tag text-amber-600 mr-1"></i>{{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>
    <hr class="border-t border-slate-200">
    <div class="p-4 bg-gray-50 flex justify-between items-center text-xs text-gray-500">
        <span class="block italic text-xs">
            <i class="fas fa-clock text-amber-500 mr-1"></i>{{ ceil(str_word_count(strip_tags($post->body)) / 200) }}
            min de lectura
        </span>
        <span class="text-xs">
            <i class="fas fa-calendar-alt text-amber-500 mr-1"></i>{{ $post->created_at->diffForHumans() }}
        </span>
    </div>
</div>
