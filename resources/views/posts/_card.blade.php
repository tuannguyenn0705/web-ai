{{-- Post Card Component --}}
<article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition duration-300 group flex flex-col">
    {{-- Ảnh đại diện --}}
    <div class="aspect-w-16 aspect-h-9 bg-gradient-to-br from-indigo-400 to-purple-500 h-48 overflow-hidden">
        @if($post->featured_image)
            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}"
                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        @else
            <div class="w-full h-full flex items-center justify-center text-white text-4xl">🤖</div>
        @endif
    </div>

    <div class="p-5 flex flex-col flex-grow">
        {{-- Category & Type --}}
        <div class="flex items-center space-x-2 mb-3">
            <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                {{ $post->category->name ?? 'Chưa phân loại' }}
            </span>
            <span class="text-xs text-gray-400">
                @switch($post->type)
                    @case('news') 📰 Tin tức @break
                    @case('review') ⭐ Review @break
                    @case('tutorial') 📚 Hướng dẫn @break
                    @case('update') 🔄 Cập nhật @break
                @endswitch
            </span>
        </div>

        {{-- Title --}}
        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-indigo-600 transition">
            <a href="{{ route('posts.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </h3>

        {{-- Excerpt --}}
        <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">
            {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
        </p>

        {{-- Meta --}}
        <div class="flex items-center justify-between text-xs text-gray-400 border-t border-gray-100 pt-3">
            <div class="flex items-center space-x-3">
                <span>{{ $post->author->name ?? 'Admin' }}</span>
                <span>{{ $post->published_at?->format('d/m/Y') }}</span>
            </div>
            <span>👁 {{ number_format($post->views_count) }}</span>
        </div>
    </div>
</article>
