@extends('layouts.app')

@section('title', $title ?? 'Thông Báo Lỗi')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-20 flex items-center justify-center min-h-[70vh]">
    <div class="w-full bg-white rounded-3xl border border-gray-200/90 shadow-sm p-8 sm:p-14 text-center relative overflow-hidden">
        
        {{-- Số mã lỗi nền mờ trang nhã --}}
        <div class="font-mono text-8xl sm:text-9xl font-black text-gray-100 select-none tracking-tight leading-none mb-3">
            @yield('code', 'Error')
        </div>

        {{-- Badge trạng thái lỗi --}}
        <div class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-semibold uppercase tracking-wider mb-4 border @yield('badge_style', 'bg-orange-50 text-orange-700 border-orange-200/80')">
            @yield('badge', 'Thông báo hệ thống')
        </div>

        {{-- Tiêu đề lỗi rõ ràng, lịch sự --}}
        <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-950 font-sans tracking-tight mb-4">
            @yield('headline', 'Đã xảy ra sự cố')
        </h1>

        {{-- Mô tả lỗi thân thiện, bảo mật, không lộ backend --}}
        <p class="text-gray-600 text-sm sm:text-base max-w-lg mx-auto leading-relaxed mb-8">
            @yield('message', 'Không thể hoàn tất yêu cầu của bạn vào lúc này.')
        </p>

        {{-- Các nút điều hướng nhanh cho người dùng --}}
        <div class="flex flex-wrap items-center justify-center gap-3">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-950 hover:bg-gray-800 text-white rounded-xl text-xs sm:text-sm font-semibold transition shadow-xs cursor-pointer">
                <span>←</span>
                <span>Quay về trang chủ</span>
            </a>

            <a href="{{ route('posts.index', ['type' => 'news']) }}" 
               class="inline-flex items-center px-4 py-2.5 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 rounded-xl text-xs sm:text-sm font-medium transition shadow-2xs">
                Tin tức AI mới nhất
            </a>

            <a href="javascript:history.back()" 
               class="inline-flex items-center px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs sm:text-sm font-medium transition">
                Quay lại trang trước
            </a>
        </div>

        {{-- Chân thông báo bảo mật --}}
        <div class="mt-10 pt-6 border-t border-gray-100 text-xs text-gray-400">
            <span>Hệ thống bảo mật AI Hub 2026 • Mọi yêu cầu được kiểm soát an toàn</span>
        </div>
    </div>
</div>
@endsection
