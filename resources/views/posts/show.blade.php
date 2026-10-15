@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->excerpt ?? Str::limit(strip_tags($post->content), 160))

@section('content')
<article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Breadcrumb --}}
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('home') }}" class="hover:text-indigo-600">Trang chủ</a>
        <span class="mx-2">/</span>
        <a href="{{ route('categories.show', $post->category->slug ?? '') }}" class="hover:text-indigo-600">
            {{ $post->category->name ?? 'Chưa phân loại' }}
        </a>
        <span class="mx-2">/</span>
        <span class="text-gray-900">{{ Str::limit($post->title, 50) }}</span>
    </nav>

    {{-- Header --}}
    <header class="mb-8">
        <div class="flex items-center space-x-2 mb-4">
            <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-semibold px-3 py-1 rounded-full">
                {{ $post->category->name ?? '' }}
            </span>
            <span class="text-xs text-gray-500">
                @switch($post->type)
                    @case('news') 📰 Tin tức @break
                    @case('review') ⭐ Review @break
                    @case('tutorial') 📚 Hướng dẫn @break
                    @case('update') 🔄 Cập nhật @break
                @endswitch
            </span>
        </div>

        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 leading-tight mb-4">
            {{ $post->title }}
        </h1>

        @if($post->excerpt)
            <p class="text-lg text-gray-600 leading-relaxed">{{ $post->excerpt }}</p>
        @endif

        <div class="flex items-center space-x-4 mt-6 text-sm text-gray-500">
            <span class="font-medium text-gray-700">{{ $post->author->name ?? 'Admin' }}</span>
            <span>{{ $post->published_at?->format('d/m/Y H:i') }}</span>
            <span>👁 {{ number_format($post->views_count) }} lượt xem</span>
        </div>
    </header>

    {{-- Featured Image --}}
    @if($post->featured_image)
    <div class="mb-8 rounded-2xl overflow-hidden shadow-lg">
        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}"
             class="w-full h-auto object-cover">
    </div>
    @endif

    {{-- Content --}}
    <div class="prose prose-lg prose-indigo max-w-none mb-10">
        {!! $post->content !!}
    </div>

    {{-- Tags --}}
    @if($post->tags->count() > 0)
    <div class="border-t border-gray-200 pt-6 mb-8">
        <div class="flex flex-wrap gap-2">
            <span class="text-sm text-gray-500 font-medium mr-2">Tags:</span>
            @foreach($post->tags as $tag)
                <a href="{{ route('tags.show', $tag->slug) }}"
                   class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm hover:bg-indigo-100 hover:text-indigo-700 transition">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Related Posts --}}
    @if($relatedPosts->count() > 0)
    <section class="border-t border-gray-200 pt-8 mb-10">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">📌 Bài viết liên quan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($relatedPosts as $related)
                @include('posts._card', ['post' => $related])
            @endforeach
        </div>
    </section>
    @endif

    {{-- Comments Section --}}
    <section class="border-t border-gray-200 pt-8" id="comments">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">
            💬 Bình luận ({{ $post->comments->count() }})
        </h2>

        {{-- Comment Form --}}
        <div class="bg-gray-50 rounded-xl p-6 mb-8">
            <h3 class="text-lg font-semibold mb-4">Để lại bình luận</h3>
            <form action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf

                @guest
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" name="guest_name" placeholder="Tên của bạn *" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <input type="email" name="guest_email" placeholder="Email *" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
                @endguest

                <textarea name="content" rows="4" placeholder="Viết bình luận..." required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent mb-4"></textarea>

                <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition">
                    Gửi bình luận
                </button>
            </form>
        </div>

        {{-- Comments List --}}
        @forelse($post->comments as $comment)
        <div class="bg-white rounded-xl p-5 mb-4 shadow-sm">
            <div class="flex items-center space-x-3 mb-3">
                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center">
                    <span class="text-indigo-600 font-semibold">
                        {{ strtoupper(substr($comment->user->name ?? $comment->guest_name ?? 'A', 0, 1)) }}
                    </span>
                </div>
                <div>
                    <p class="font-semibold text-gray-900 text-sm">
                        {{ $comment->user->name ?? $comment->guest_name ?? 'Ẩn danh' }}
                    </p>
                    <p class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <p class="text-gray-700">{{ $comment->content }}</p>
        </div>
        @empty
            <p class="text-gray-500 text-center py-8">Chưa có bình luận nào. Hãy là người đầu tiên!</p>
        @endforelse
    </section>
</article>
@endsection
