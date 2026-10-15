@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Tổng bài viết</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['total_posts'] }}</p>
                </div>
                <span class="text-3xl">📝</span>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Đã xuất bản</p>
                    <p class="text-3xl font-bold text-green-600">{{ $stats['published_posts'] }}</p>
                </div>
                <span class="text-3xl">✅</span>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Bản nháp</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $stats['draft_posts'] }}</p>
                </div>
                <span class="text-3xl">📋</span>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Bình luận chờ duyệt</p>
                    <p class="text-3xl font-bold text-red-600">{{ $stats['pending_comments'] }}</p>
                </div>
                <span class="text-3xl">💬</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Recent Posts --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Bài viết gần đây</h2>
                <a href="{{ route('admin.posts.create') }}" class="text-sm text-indigo-600 hover:text-indigo-800">+ Thêm mới</a>
            </div>
            <div class="space-y-3">
                @forelse($recentPosts as $post)
                <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ Str::limit($post->title, 40) }}</p>
                        <p class="text-xs text-gray-500">{{ $post->category->name ?? '' }} · {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <span class="px-2 py-1 text-xs rounded-full {{ $post->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ $post->status === 'published' ? 'Đã đăng' : 'Nháp' }}
                    </span>
                </div>
                @empty
                <p class="text-gray-500 text-sm">Chưa có bài viết nào.</p>
                @endforelse
            </div>
        </div>

        {{-- Recent Comments --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Bình luận gần đây</h2>
            <div class="space-y-3">
                @forelse($recentComments as $comment)
                <div class="py-2 border-b border-gray-100 last:border-0">
                    <p class="text-sm text-gray-900">{{ Str::limit($comment->content, 60) }}</p>
                    <p class="text-xs text-gray-500 mt-1">
                        {{ $comment->user->name ?? $comment->guest_name ?? 'Ẩn danh' }}
                        · {{ $comment->created_at->diffForHumans() }}
                        @if(!$comment->is_approved)
                            <span class="text-red-500 font-medium">· Chờ duyệt</span>
                        @endif
                    </p>
                </div>
                @empty
                <p class="text-gray-500 text-sm">Chưa có bình luận nào.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
