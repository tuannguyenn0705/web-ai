{{-- Editorial Performance & Parameter Evaluation Scorecard (Bảng Đánh Giá Thông Số Chi Tiết) --}}
@php
    $scoreStyle = match($spotlight['accent'] ?? 'blue') {
        'blue' => [
            'surface' => 'bg-gradient-to-br from-blue-50/70 via-white to-indigo-50/50 border-blue-200/80',
            'score_box' => 'bg-white border-blue-200/80 text-blue-700',
            'bar' => 'bg-gradient-to-r from-blue-600 to-indigo-600',
            'star' => 'text-blue-600',
            'btn' => 'bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white shadow-[0_8px_18px_-4px_rgba(37,99,235,0.4)]',
        ],
        'violet' => [
            'surface' => 'bg-gradient-to-br from-violet-50/70 via-white to-purple-50/50 border-violet-200/80',
            'score_box' => 'bg-white border-violet-200/80 text-violet-700',
            'bar' => 'bg-gradient-to-r from-violet-600 to-purple-600',
            'star' => 'text-violet-600',
            'btn' => 'bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-500 hover:to-purple-500 text-white shadow-[0_8px_18px_-4px_rgba(124,58,237,0.4)]',
        ],
        default => [
            'surface' => 'bg-gradient-to-br from-teal-50/70 via-white to-emerald-50/50 border-teal-200/80',
            'score_box' => 'bg-white border-teal-200/80 text-teal-700',
            'bar' => 'bg-gradient-to-r from-teal-600 to-emerald-600',
            'star' => 'text-teal-600',
            'btn' => 'bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 text-white shadow-[0_8px_18px_-4px_rgba(13,148,136,0.4)]',
        ],
    };
@endphp

@if(!empty($spotlight['scorecard']))
<section id="evaluation-scorecard" class="not-prose my-8 scroll-mt-28 rounded-2xl border p-6 sm:p-8 shadow-2xs {{ $scoreStyle['surface'] }}">
    <div class="flex flex-wrap items-center justify-between gap-3 pb-5 mb-6 border-b border-slate-200/80">
        <div>
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block">Independent Benchmark Scorecard</span>
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-950 tracking-tight m-0">
                {{ $spotlight['name'] }} Parameter &amp; Performance Evaluation
            </h2>
        </div>
        <span class="text-xs font-semibold text-slate-500">Tested &amp; Verified ({{ date('Y') }})</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
        {{-- Overall Score Summary Box (4 Cols) --}}
        <div class="lg:col-span-4 rounded-2xl border p-5 text-center shadow-2xs {{ $scoreStyle['score_box'] }}">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-1">Overall Rating</span>
            <div class="text-4xl sm:text-5xl font-extrabold text-slate-950 tracking-tight my-1">
                {{ $spotlight['rating_num'] ?? '4.9' }}<span class="text-lg font-semibold text-slate-400">/5</span>
            </div>
            <div class="flex items-center justify-center gap-1 my-2">
                @for($i = 0; $i < 5; $i++)
                    <svg class="w-4 h-4 {{ $scoreStyle['star'] }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
            </div>
            <p class="text-xs text-slate-500 mb-4">{{ $spotlight['reviews_label'] ?? 'Editor\'s Choice' }}</p>

            <a href="{{ $spotlight['primary_url'] ?? $spotlight['ref_url'] }}"
               target="_blank"
               rel="noopener noreferrer sponsored nofollow"
               class="relative overflow-hidden group w-full inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 hover:-translate-y-0.5 no-underline {{ $scoreStyle['btn'] }}">
                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                <span>{{ $spotlight['cta_primary'] }}</span>
            </a>
        </div>

        {{-- 5 Parameter Bars (8 Cols) --}}
        <div class="lg:col-span-8 space-y-3.5">
            @foreach($spotlight['scorecard'] as $metric)
                <div>
                    <div class="flex items-center justify-between text-xs sm:text-sm mb-1.5">
                        <span class="font-semibold text-slate-800">{{ $metric['label'] }}</span>
                        <span class="font-extrabold text-slate-950">{{ $metric['score'] }} / 5.0</span>
                    </div>
                    <div class="w-full h-2.5 bg-slate-200/80 rounded-full overflow-hidden">
                        <div class="h-full rounded-full {{ $scoreStyle['bar'] }}" style="width: {{ $metric['percent'] }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
