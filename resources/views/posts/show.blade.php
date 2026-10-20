@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->excerpt ?? Str::limit(strip_tags($post->content), 160))

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
    
    {{-- ======================================================== --}}
    {{-- BLOCK 1: BREADCRUMB & ARTICLE HEADER                     --}}
    {{-- ======================================================== --}}
    <header class="mb-8 sm:mb-10">
        {{-- Breadcrumb navigation --}}
        <nav class="flex items-center flex-wrap gap-2 text-xs sm:text-sm text-gray-500 mb-5">
            <a href="{{ route('home') }}" class="hover:text-gray-900 transition">Home</a>
            <span class="text-gray-300">/</span>
            @if($post->category)
                <a href="{{ route('categories.show', $post->category->slug) }}" class="hover:text-gray-900 transition">
                    {{ $post->category->name }}
                </a>
                <span class="text-gray-300">/</span>
            @endif
            <span class="text-gray-900 font-medium truncate max-w-xs sm:max-w-md">{{ $post->title }}</span>
        </nav>

        {{-- Category & Post Type Badges --}}
        <div class="flex flex-wrap items-center gap-2.5 mb-4">
            @if($post->category)
                <a href="{{ route('categories.show', $post->category->slug) }}"
                   class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-orange-50 text-orange-700 border border-orange-200/70 hover:bg-orange-100 transition">
                    {{ $post->category->name }}
                </a>
            @endif

            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200">
                @switch($post->type)
                    @case('news') News @break
                    @case('review') Review @break
                    @case('tutorial') Tutorial @break
                    @default Article
                @endswitch
            </span>

            @php
                $wordCount = str_word_count(strip_tags($post->content));
                $readingMinutes = max(1, (int) ceil($wordCount / 200));
            @endphp
            <span class="text-xs text-gray-400 font-medium">
                {{ $readingMinutes }} min read
            </span>
        </div>

        {{-- H1 Article Title --}}
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-950 tracking-tight leading-[1.2] font-sans mb-5">
            {{ $post->title }}
        </h1>

        {{-- Excerpt / Lead Summary --}}
        @if($post->excerpt)
            <div class="text-lg sm:text-xl text-gray-600 font-normal leading-relaxed mb-6 max-w-5xl">
                {{ $post->excerpt }}
            </div>
        @endif

        {{-- Author, Published Date, Views --}}
        <div class="flex flex-wrap items-center gap-4 sm:gap-6 text-xs sm:text-sm text-gray-500 pt-4 border-t border-gray-200/80">
            <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-full bg-gray-900 text-white flex items-center justify-center text-xs font-bold uppercase">
                    {{ substr($post->author->name ?? 'A', 0, 1) }}
                </div>
                <span class="font-medium text-gray-800">{{ $post->author->name ?? 'Editorial Team' }}</span>
            </div>
            <span class="text-gray-300">•</span>
            <span>Published: {{ $post->published_at?->format('M d, Y') ?? $post->created_at->format('M d, Y') }}</span>
            <span class="text-gray-300">•</span>
            <span>{{ number_format($post->views_count) }} views</span>
        </div>
    </header>

    {{-- ======================================================== --}}
    {{-- BLOCK 2: HERO FEATURED IMAGE                             --}}
    {{-- ======================================================== --}}
    @if($post->featured_image)
        <div class="mb-10 sm:mb-14 rounded-2xl sm:rounded-3xl overflow-hidden border border-gray-200/90 shadow-xs bg-gray-100">
            <img src="{{ Storage::url($post->featured_image) }}" 
                 alt="{{ $post->title }}"
                 class="w-full max-h-[580px] aspect-[16/9] sm:aspect-[21/9] lg:aspect-[2.4/1] object-cover">
        </div>
    @endif

    {{-- ======================================================== --}}
    {{-- BLOCK 3: ARTICLE BODY CONTENT                            --}}
    {{-- ======================================================== --}}
    <article class="mb-12 sm:mb-16">
        <div class="prose prose-lg sm:prose-xl max-w-none text-gray-800 leading-relaxed font-sans prose-headings:font-bold prose-headings:text-gray-950 prose-headings:tracking-tight prose-a:text-orange-600 prose-a:font-medium hover:prose-a:text-orange-700 prose-img:rounded-2xl prose-img:shadow-xs prose-img:border prose-img:border-gray-200/90 prose-img:my-8 prose-blockquote:border-l-4 prose-blockquote:border-orange-500 prose-blockquote:bg-orange-50/50 prose-blockquote:rounded-r-2xl prose-blockquote:py-3 prose-blockquote:px-6 prose-blockquote:italic">
            {!! $post->content !!}
        </div>

        {{-- Article Tags --}}
        @if($post->tags->count() > 0)
            <div class="flex flex-wrap items-center gap-2 pt-8 mt-8 border-t border-gray-200/80">
                <span class="text-xs font-semibold uppercase tracking-wider text-gray-400 mr-2">Related Topics:</span>
                @foreach($post->tags as $tag)
                    <a href="{{ route('tags.show', $tag->slug) }}"
                       class="px-3 py-1 bg-gray-100 hover:bg-orange-50 hover:text-orange-700 text-gray-700 rounded-full text-xs font-medium transition border border-gray-200/80">
                        #{{ $tag->name }}
                    </a>
                @endforeach
            </div>
        @endif
    </article>

    {{-- ======================================================== --}}
    {{-- BLOCK 4: RELATED ARTICLES (3-COLUMN GRID)                --}}
    {{-- ======================================================== --}}
    @if($relatedPosts->count() > 0)
        <section class="border-t border-gray-200/90 pt-10 sm:pt-14 mb-14">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-orange-600 block mb-1">More in this category</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-950 tracking-tight font-sans">
                        Related Articles
                    </h2>
                </div>
                <a href="{{ route('posts.index') }}" class="text-xs sm:text-sm font-semibold text-gray-600 hover:text-gray-950 transition">
                    View all articles →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($relatedPosts as $related)
                    <article class="bg-white rounded-2xl border border-gray-200/90 shadow-xs overflow-hidden hover:shadow-md hover:border-gray-300 transition-all duration-300 flex flex-col group">
                        {{-- Card Thumbnail --}}
                        <a href="{{ route('posts.show', $related->slug) }}" class="block aspect-[16/9] bg-gray-100 overflow-hidden relative">
                            @if($related->featured_image)
                                <img src="{{ Storage::url($related->featured_image) }}" 
                                     alt="{{ $related->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 text-gray-400 font-mono text-sm">
                                    AI Hub 2026
                                </div>
                            @endif
                            <div class="absolute top-3 left-3">
                                <span class="bg-white/95 backdrop-blur-md text-gray-900 text-[11px] font-semibold px-2.5 py-1 rounded-full shadow-xs border border-gray-200/60">
                                    {{ $related->category->name ?? 'News' }}
                                </span>
                            </div>
                        </a>

                        {{-- Card Summary --}}
                        <div class="p-5 flex flex-col flex-grow">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                <span>{{ $related->published_at?->format('M d, Y') ?? $related->created_at->format('M d, Y') }}</span>
                                <span>•</span>
                                <span>{{ number_format($related->views_count) }} views</span>
                            </div>

                            <h3 class="text-base sm:text-lg font-bold text-gray-950 group-hover:text-orange-600 transition-colors line-clamp-2 mb-2 leading-snug">
                                <a href="{{ route('posts.show', $related->slug) }}">
                                    {{ $related->title }}
                                </a>
                            </h3>

                            <p class="text-xs sm:text-sm text-gray-600 line-clamp-2 leading-relaxed mb-4 flex-grow">
                                {{ $related->excerpt ?? Str::limit(strip_tags($related->content), 100) }}
                            </p>

                            <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                                <span class="font-medium text-gray-700">{{ $related->author->name ?? 'AI Hub' }}</span>
                                <span class="font-semibold text-orange-600 group-hover:translate-x-1 transition-transform">Read article →</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ======================================================== --}}
    {{-- BLOCK 5: ARTICLE COMMENTS                                --}}
    {{-- ======================================================== --}}
    <section class="border-t border-gray-200/90 pt-10 sm:pt-14" id="comments">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-950 tracking-tight font-sans mb-8">
            Comments ({{ $post->comments->count() }})
        </h2>

        {{-- Comment Submission Form --}}
        <div class="bg-white rounded-2xl border border-gray-200/90 p-6 sm:p-8 mb-10 shadow-xs">
            <h3 class="text-base font-bold text-gray-900 mb-4">Leave your thoughts on this article</h3>
            
            <form action="{{ route('comments.store', $post->id) }}" method="POST" class="space-y-4">
                @csrf

                @guest
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase text-gray-600 mb-1.5">Your Name *</label>
                            <input type="text" name="guest_name" required placeholder="John Doe"
                                   class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-gray-900">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase text-gray-600 mb-1.5">Email Address *</label>
                            <input type="email" name="guest_email" required placeholder="you@example.com"
                                   class="w-full px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-gray-900">
                        </div>
                    </div>
                @endguest

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-600 mb-1.5">Your Comment *</label>
                    <textarea name="content" rows="4" required placeholder="Share your perspective or ask a question..."
                              class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 leading-relaxed"></textarea>
                </div>

                <button type="submit"
                        class="px-6 py-2.5 bg-gray-950 hover:bg-gray-800 text-white font-semibold rounded-xl text-sm transition shadow-xs cursor-pointer">
                    Post Comment
                </button>
            </form>
        </div>

        {{-- Comments List --}}
        <div class="space-y-4">
            @forelse($post->comments as $comment)
                <div class="bg-white rounded-2xl border border-gray-200/80 p-5 shadow-xs">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-9 h-9 rounded-full bg-orange-100 text-orange-700 flex items-center justify-center font-bold text-sm">
                            {{ strtoupper(substr($comment->user->name ?? $comment->guest_name ?? 'A', 0, 1)) }}
                        </div>
                        <div>
                            <p class="font-bold text-gray-900 text-sm">
                                {{ $comment->user->name ?? $comment->guest_name ?? 'Anonymous Reader' }}
                            </p>
                            <p class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 text-sm leading-relaxed">{{ $comment->content }}</p>
                </div>
            @empty
                <div class="text-center py-10 bg-white rounded-2xl border border-dashed border-gray-200 text-gray-400 text-sm">
                    No comments yet for this article. Be the first to share your thoughts!
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection
