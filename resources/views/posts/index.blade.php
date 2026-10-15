@extends('layouts.app')

@section('title', 'Bài viết' . (request('type') ? ' - ' . ucfirst(request('type')) : ''))

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Page Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            @if(request('type'))
                @switch(request('type'))
                    @case('news') 📰 Tin tức AI @break
                    @case('review') ⭐ Review @break
                    @case('tutorial') 📚 Hướng dẫn @break
                    @case('update') 🔄 Cập nhật AI @break
                @endswitch
            @elseif(request('search'))
                🔍 Kết quả tìm kiếm: "{{ request('search') }}"
            @else
                📝 Tất cả bài viết
            @endif
        </h1>
    </div>

    {{-- Filter Tabs --}}
    <div class="flex flex-wrap gap-2 mb-8">
        <a href="{{ route('posts.index') }}"
           class="px-4 py-2 rounded-full text-sm font-medium {{ !request('type') ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-indigo-600' }} transition">
            Tất cả
        </a>
        @foreach(['news' => '📰 Tin tức', 'review' => '⭐ Review', 'tutorial' => '📚 Hướng dẫn', 'update' => '🔄 Cập nhật'] as $type => $label)
            <a href="{{ route('posts.index', ['type' => $type]) }}"
               class="px-4 py-2 rounded-full text-sm font-medium {{ request('type') === $type ? 'bg-indigo-600 text-white' : 'bg-white text-gray-700 border border-gray-200 hover:border-indigo-600' }} transition">
                {{ $label }}
            </a>
        @endforeach
    </div>

    {{-- Posts Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)
            @include('posts._card', ['post' => $post])
        @empty
            <div class="col-span-3 text-center py-16 text-gray-500">
                <div class="text-6xl mb-4">🔍</div>
                <p class="text-lg">Không tìm thấy bài viết nào.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $posts->appends(request()->query())->links() }}
    </div>
</div>
@endsection
