@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')

{{-- Hero Section (Taste Skill Style - 100% Full Viewport Height Frame) --}}
<section class="relative bg-[#FAF9F6] overflow-hidden min-h-screen lg:h-screen flex items-center justify-center pt-20 sm:pt-24 lg:pt-14 pb-8 lg:pb-0">
    <!-- Decorative Ambient Glow Blobs -->
    <div class="absolute top-[-15%] left-[-10%] w-[45vw] h-[45vw] bg-orange-200/35 rounded-full blur-[120px] mix-blend-multiply pointer-events-none"></div>
    <div class="absolute bottom-[-15%] right-[-10%] w-[45vw] h-[45vw] bg-indigo-200/35 rounded-full blur-[120px] mix-blend-multiply pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-8 lg:gap-12">
            
            {{-- Left: Typography & CTA (Editorial Luxury Design) --}}
            <div class="w-full lg:w-1/2 max-w-xl relative z-20 flex-shrink-0">
                
                {{-- Interactive Micro Badge --}}
                <div class="inline-flex items-center gap-2.5 px-4 py-2 rounded-full bg-white/80 backdrop-blur-md border border-gray-200/90 shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] hover:border-orange-300 hover:shadow-[0_4px_16px_-4px_rgba(249,115,22,0.15)] transition-all duration-300 group cursor-pointer mb-6">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-orange-500"></span>
                    </span>
                    <span class="text-xs font-semibold tracking-wider text-gray-700 uppercase font-sans">AI Trends 2026</span>
                    <span class="text-gray-300 font-light">|</span>
                    <span class="text-xs font-medium text-orange-600 group-hover:translate-x-0.5 transition-transform flex items-center gap-1">
                        Cập nhật mới
                        <svg class="w-3 h-3 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                </div>

                {{-- Headline with Editorial Serif & Italic Gradient Accent --}}
                <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] xl:text-[3.75rem] font-bold text-gray-950 leading-[1.08] mb-5 font-serif tracking-tight">
                    Thế giới AI,<br/>
                    <span class="italic font-normal text-transparent bg-clip-text bg-gradient-to-r from-gray-900 via-stone-700 to-orange-600">
                        Nằm trong tay bạn.
                    </span>
                </h1>

                {{-- Refined Editorial Description --}}
                <p class="text-base sm:text-lg text-gray-600 mb-8 max-w-lg leading-relaxed font-light">
                    <span class="font-normal text-gray-900">Không còn thiết kế rập khuôn.</span> Khám phá tuyển tập các công cụ AI đột phá, bài đánh giá chuyên sâu và xu hướng công nghệ mới nhất giúp bạn dẫn đầu cuộc đua sáng tạo.
                </p>

                {{-- Interactive CTA Buttons with Rich Hover Micro-interactions --}}
                <div class="flex flex-wrap items-center gap-4">
                    {{-- Primary Button: Shimmer light sweep + Arrow translate + Soft lift --}}
                    <a href="#latest" 
                       class="relative group overflow-hidden bg-gray-950 text-white px-8 py-3.5 rounded-full font-medium text-sm transition-all duration-300 shadow-[0_12px_24px_-8px_rgba(0,0,0,0.5)] hover:shadow-[0_20px_35px_-10px_rgba(0,0,0,0.65)] hover:-translate-y-1 active:translate-y-0 active:scale-95 inline-flex items-center gap-2.5 whitespace-nowrap">
                        <!-- Shimmer light reflection sweep on hover -->
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                        
                        <span>Khám phá ngay</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    {{-- Secondary Button: Color Invert Fill + Border Highlight + 45deg Arrow --}}
                    <a href="{{ route('posts.index', ['type' => 'review']) }}" 
                       class="group bg-white/90 backdrop-blur-sm text-gray-800 border border-gray-200/90 px-8 py-3.5 rounded-full font-medium text-sm transition-all duration-300 shadow-sm hover:bg-gray-900 hover:text-white hover:border-gray-900 hover:shadow-[0_12px_25px_-10px_rgba(0,0,0,0.25)] hover:-translate-y-1 active:translate-y-0 active:scale-95 inline-flex items-center gap-2 whitespace-nowrap">
                        <span>Đọc Review</span>
                        <svg class="w-4 h-4 transition-transform duration-300 text-gray-400 group-hover:text-white group-hover:translate-x-0.5 group-hover:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                </div>

                {{-- Micro Trust & Authority Proof --}}
                <div class="mt-8 pt-5 border-t border-gray-200/60 flex flex-wrap items-center gap-5">
                    <div class="flex items-center gap-2">
                        <div class="flex -space-x-2">
                            <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-orange-500 to-amber-400 border-2 border-white flex items-center justify-center text-[10px] font-bold text-white shadow-xs">AI</div>
                            <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-indigo-600 to-purple-500 border-2 border-white flex items-center justify-center text-[10px] font-bold text-white shadow-xs">⚡</div>
                            <div class="w-7 h-7 rounded-full bg-gradient-to-tr from-emerald-600 to-teal-400 border-2 border-white flex items-center justify-center text-[10px] font-bold text-white shadow-xs">★</div>
                        </div>
                        <span class="text-xs font-medium text-gray-700"><strong>500+</strong> công cụ & bài viết</span>
                    </div>
                    <div class="hidden sm:block h-3.5 w-px bg-gray-300"></div>
                    <div class="flex items-center gap-1.5 text-xs text-gray-500">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Đánh giá khách quan & cập nhật 24/7</span>
                    </div>
                </div>

            </div>

            {{-- Right: Infinite Curved Path Image Carousel (Full 100vh Stage) --}}
            <div class="w-full lg:w-1/2 relative h-[520px] lg:h-[580px] overflow-hidden pointer-events-none select-none" id="curved-carousel">
                @php
                    // 4 thẻ giao diện chọn lọc chuẩn Taste Skill (0ms latency, chạy cục bộ)
                    $localCards = [
                        asset('images/carousel/card-1.svg'),
                        asset('images/carousel/card-2.svg'),
                        asset('images/carousel/card-3.svg'),
                        asset('images/carousel/card-5.svg'),
                    ];
                @endphp

                {{-- STRICT CONSTRAINTS: ONLY pure images (<img>), NO text, NO links, NO clickable cards --}}
                @foreach($localCards as $index => $imgUrl)
                    <div class="carousel-card-item absolute top-0 left-0 w-[260px] h-[170px] sm:w-[280px] sm:h-[185px] rounded-2xl md:rounded-3xl overflow-hidden shadow-[0_20px_50px_-10px_rgba(0,0,0,0.25)] border-4 border-white pointer-events-none select-none bg-[#111827]" 
                         style="will-change: transform, opacity; opacity: 0; transform-origin: center center;">
                        <img src="{{ $imgUrl }}" 
                             alt="Taste Skill Visual {{ $index + 1 }}" 
                             class="w-full h-full object-cover pointer-events-none select-none block"
                             loading="eager">
                    </div>
                @endforeach
            </div>

            @push('scripts')
            <script>
            (function() {
                function initCurvedCarousel() {
                    const container = document.getElementById('curved-carousel');
                    if (!container) return;

                    const items = Array.from(container.querySelectorAll('.carousel-card-item'));
                    if (!items.length) return;

                    // 4 thẻ phân bổ đều khoảng cách: 0.0, 0.25, 0.5, 0.75
                    let progressList = items.map((_, i) => i / items.length);
                    const speed = 0.0016; 
                    let lastTimestamp = performance.now();

                    function step(now) {
                        const delta = Math.min((now - lastTimestamp) / 16.666, 3.0);
                        lastTimestamp = now;

                        const w = container.offsetWidth || 500;
                        const h = container.offsetHeight || 580;
                        
                        const cardW = items[0].offsetWidth || 280;
                        const cardH = items[0].offsetHeight || 185;

                        // Điểm xuất phát (ở góc trên, an toàn bên trong cột phải)
                        const startX = w * 0.18;
                        const startY = -cardH * 0.50;
                        
                        // Quỹ đạo cung tròn vát ngang sang bên phải
                        const arcWidth = w * 1.15; 
                        const arcHeight = h * 0.88;

                        progressList = progressList.map(p => {
                            let np = p + (speed * delta);
                            return np >= 1 ? np - 1 : np;
                        });

                        for (let i = 0; i < items.length; i++) {
                            const item = items[i];
                            const p = progressList[i];
                            const theta = p * (Math.PI / 2); // 0 đến 90 độ (1/4 cung tròn)

                            // 1. Quỹ đạo: Đi từ trên xuống rồi bẻ ngang sang phải
                            const x = startX + arcWidth * (1 - Math.cos(theta));
                            const y = startY + arcHeight * Math.sin(theta);

                            // 2. Dynamic Scaling: Đến tâm (p <= 0.48) đạt 1.18x, qua đỉnh thu nhỏ nhanh xuống 0.35x
                            let scale;
                            if (p <= 0.48) {
                                scale = 0.45 + (0.73 * Math.sin(p * Math.PI));
                            } else {
                                const exitT = (p - 0.48) / 0.52;
                                scale = 1.18 - (0.83 * Math.pow(exitT, 0.75));
                            }

                            // 3. Dynamic Opacity: Rõ 100% tại tâm, mờ nhanh khi thoát
                            let opacity;
                            if (p < 0.20) {
                                opacity = p / 0.20;
                            } else if (p <= 0.55) {
                                opacity = 1.0;
                            } else {
                                const fadeT = (p - 0.55) / 0.35;
                                opacity = Math.max(0, 1.0 - Math.pow(Math.min(fadeT, 1.0), 0.85));
                            }

                            // 4. Góc nghiêng tự nhiên
                            const rotate = -8 + (24 * p);
                            const zIndex = Math.round((1 - Math.abs(p - 0.48)) * 100);

                            const posX = (x - cardW / 2).toFixed(1);
                            const posY = (y - cardH / 2).toFixed(1);

                            item.style.transform = `translate(${posX}px, ${posY}px) scale(${scale.toFixed(3)}) rotate(${rotate.toFixed(1)}deg)`;
                            item.style.opacity = opacity.toFixed(3);
                            item.style.zIndex = zIndex;
                        }

                        requestAnimationFrame(step);
                    }

                    requestAnimationFrame(step);
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initCurvedCarousel);
                } else {
                    initCurvedCarousel();
                }
            })();
            </script>
            @endpush
            
        </div>
    </div>
</section>

{{-- Container for the rest of the page --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20" id="latest">
    {{-- Danh mục --}}
    @if($categories->count() > 0)
    <section class="mb-14">
        <div class="flex flex-wrap items-center gap-3">
            <span class="text-sm font-medium text-gray-400 mr-2 uppercase tracking-wider">Lọc theo:</span>
            <a href="{{ route('posts.index') }}" class="px-5 py-2.5 bg-gray-900 text-white rounded-full text-sm font-medium hover:bg-gray-800 transition shadow-sm">
                Tất cả
            </a>
            @foreach($categories as $category)
                <a href="{{ route('categories.show', $category->slug) }}"
                   class="px-5 py-2.5 bg-white text-gray-600 rounded-full text-sm font-medium border border-gray-200 hover:border-gray-900 hover:text-gray-900 transition shadow-sm hover:shadow">
                    {{ $category->name }} <span class="ml-1 text-gray-400">({{ $category->posts_count }})</span>
                </a>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Bài viết mới nhất --}}
    <section>
        <div class="flex flex-wrap items-end justify-between mb-10 border-b border-gray-200 pb-4">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 font-serif">Bài viết mới nhất</h2>
            <a href="{{ route('posts.index') }}" class="text-indigo-600 font-medium hover:text-indigo-800 flex items-center group">
                Xem tất cả 
                <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($latestPosts as $post)
                @include('posts._card', ['post' => $post])
            @empty
                <div class="col-span-3 text-center py-16 text-gray-500 bg-gray-50 rounded-2xl border border-gray-100">
                    <p class="text-lg">Chưa có bài viết nào.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-14">
            {{ $latestPosts->links() }}
        </div>
    </section>
</div>
@endsection
