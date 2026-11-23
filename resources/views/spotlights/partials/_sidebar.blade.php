{{-- Sticky Right Sidebar for Dedicated AI Spotlight Pages (Clean Light Surface + High-Impact Shimmer Buttons) --}}
@php
    $theme = match($spotlight['accent'] ?? 'blue') {
        'blue' => [
            'card_bg' => 'bg-gradient-to-b from-blue-50/80 via-white to-white border-blue-200/90',
            'badge' => 'bg-blue-100 text-blue-800 border-blue-200',
            'cta' => 'bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white shadow-[0_8px_20px_-4px_rgba(37,99,235,0.45)] hover:shadow-[0_12px_25px_-4px_rgba(37,99,235,0.6)]',
            'sub_cta' => 'bg-white border-blue-200 text-blue-700 hover:bg-blue-50 hover:border-blue-300',
            'tag' => 'text-blue-600',
            'bullet' => 'bg-blue-600',
            'star' => 'text-blue-600',
        ],
        'violet' => [
            'card_bg' => 'bg-gradient-to-b from-violet-50/80 via-white to-white border-violet-200/90',
            'badge' => 'bg-violet-100 text-violet-800 border-violet-200',
            'cta' => 'bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-500 hover:to-purple-500 text-white shadow-[0_8px_20px_-4px_rgba(124,58,237,0.45)] hover:shadow-[0_12px_25px_-4px_rgba(124,58,237,0.6)]',
            'sub_cta' => 'bg-white border-violet-200 text-violet-700 hover:bg-violet-50 hover:border-violet-300',
            'tag' => 'text-violet-600',
            'bullet' => 'bg-violet-600',
            'star' => 'text-violet-600',
        ],
        default => [
            'card_bg' => 'bg-gradient-to-b from-teal-50/80 via-white to-white border-teal-200/90',
            'badge' => 'bg-teal-100 text-teal-800 border-teal-200',
            'cta' => 'bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 text-white shadow-[0_8px_20px_-4px_rgba(13,148,136,0.45)] hover:shadow-[0_12px_25px_-4px_rgba(13,148,136,0.6)]',
            'sub_cta' => 'bg-white border-teal-200 text-teal-700 hover:bg-teal-50 hover:border-teal-300',
            'tag' => 'text-teal-700',
            'bullet' => 'bg-teal-600',
            'star' => 'text-teal-600',
        ],
    };

    $primaryTargetUrl = $spotlight['primary_url'] ?? $spotlight['ref_url'];
@endphp

<aside class="lg:col-span-4 space-y-6 lg:sticky lg:top-28">
    {{-- WIDGET 1: PRIMARY REF CONVERSION BOX --}}
    <div class="rounded-2xl border p-6 shadow-sm {{ $theme['card_bg'] }}">
        <div class="flex items-center justify-between gap-2 mb-3">
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider border {{ $theme['badge'] }}">
                {{ $spotlight['badge'] }}
            </span>
            <span class="inline-flex items-center gap-1 text-xs font-extrabold text-slate-900">
                <svg class="w-4 h-4 {{ $theme['star'] }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <span>{{ $spotlight['rating'] }}</span>
            </span>
        </div>

        <div class="flex items-center gap-2.5 mb-2">
            @if(!empty($spotlight['logo']) && file_exists(public_path($spotlight['logo'])))
                <img src="{{ asset($spotlight['logo']) }}" alt="{{ $spotlight['name'] }} Logo" class="w-7 h-7 rounded-lg object-contain bg-white border border-slate-200/80 p-0.5 shrink-0">
            @endif
            <h3 class="text-xl font-extrabold tracking-tight text-slate-950">
                Get Started with {{ $spotlight['name'] }}
            </h3>
        </div>
        <p class="text-xs text-slate-600 leading-relaxed mb-4">
            {{ $spotlight['offer_badge'] }} — Official verified link to {{ $spotlight['domain'] }}.
        </p>

        <ul class="space-y-2 mb-5 text-xs text-slate-700">
            @foreach($spotlight['highlights'] as $item)
                <li class="flex items-start gap-2.5">
                    <span class="w-1.5 h-1.5 rounded-full {{ $theme['bullet'] }} mt-1.5 shrink-0"></span>
                    <span class="font-medium">{{ $item }}</span>
                </li>
            @endforeach
        </ul>

        <div class="space-y-2.5">
            <a href="{{ $primaryTargetUrl }}"
               target="_blank"
               rel="noopener noreferrer sponsored nofollow"
               class="relative overflow-hidden group w-full inline-flex items-center justify-center px-5 py-3 rounded-xl text-sm font-extrabold transition-all duration-300 hover:-translate-y-0.5 {{ $theme['cta'] }}">
                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                <span>{{ $spotlight['cta_primary'] }}</span>
            </a>

            <a href="{{ $spotlight['ref_url'] }}"
               target="_blank"
               rel="noopener noreferrer sponsored nofollow"
               class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-xl border text-xs font-bold transition {{ $theme['sub_cta'] }}">
                Visit {{ $spotlight['domain'] }}
            </a>
        </div>
    </div>

    {{-- WIDGET 2: TOOL-SPECIFIC OFFERS LIST --}}
    @if(!empty($sidebarOffers))
        <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs">
            <div class="flex items-center justify-between pb-3.5 mb-4 border-b border-slate-100">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider {{ $theme['tag'] }} block">Verified Incentives</span>
                    <h3 class="text-base font-bold text-slate-950">{{ $spotlight['name'] }} Offers</h3>
                </div>
                <span class="text-[11px] font-semibold text-slate-400">{{ date('Y') }}</span>
            </div>

            <div class="space-y-3.5">
                @foreach($sidebarOffers as $sOffer)
                    <div class="p-3.5 rounded-xl border border-slate-100 bg-slate-50/70 hover:bg-white hover:border-slate-300 hover:shadow-md transition-all duration-200">
                        <div class="flex items-center justify-between gap-2 mb-1.5">
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded leading-none uppercase border {{ $theme['badge'] }}">
                                {{ $sOffer['badge'] }}
                            </span>
                            <span class="text-[11px] font-bold text-slate-700">{{ $sOffer['price'] }}</span>
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 leading-snug mb-1">
                            <a href="{{ $sOffer['url'] ?? $primaryTargetUrl }}" target="_blank" rel="noopener noreferrer sponsored nofollow" class="hover:underline transition">
                                {{ $sOffer['title'] }}
                            </a>
                        </h4>
                        <p class="text-xs text-slate-500 line-clamp-2 mb-3">{{ $sOffer['description'] }}</p>
                        <a href="{{ $sOffer['url'] ?? $primaryTargetUrl }}"
                           target="_blank"
                           rel="noopener noreferrer sponsored nofollow"
                           class="relative overflow-hidden group inline-flex items-center justify-center w-full px-3 py-2 rounded-lg text-xs font-bold transition-all duration-200 {{ $theme['cta'] }}">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                            <span>{{ $sOffer['cta'] }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- WIDGET 3: OTHER AI SPOTLIGHTS --}}
    @if(!empty($otherSpotlights))
        <div class="bg-white rounded-2xl border border-slate-200/90 p-5 sm:p-6 shadow-xs">
            <div class="pb-3.5 mb-4 border-b border-slate-100">
                <span class="text-[11px] font-bold uppercase tracking-wider {{ $theme['tag'] }} block">Directory Spotlight</span>
                <h3 class="text-base font-bold text-slate-950">Alternative AI Tools</h3>
            </div>
            <div class="space-y-3">
                @foreach($otherSpotlights as $other)
                    <a href="{{ route($other['route']) }}" class="block p-3.5 rounded-xl border border-slate-100 hover:border-slate-300 hover:bg-slate-50 transition group">
                        <div class="flex items-center justify-between gap-2 mb-1">
                            <div class="flex items-center gap-2 min-w-0">
                                @if(!empty($other['logo']) && file_exists(public_path($other['logo'])))
                                    <img src="{{ asset($other['logo']) }}" alt="{{ $other['name'] }} Logo" class="w-5 h-5 rounded-md object-contain bg-white border border-slate-200 p-0.5 shrink-0">
                                @endif
                                <span class="text-sm font-bold text-slate-900 group-hover:underline transition truncate">{{ $other['name'] }}</span>
                            </div>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-700 uppercase shrink-0">{{ $other['badge'] }}</span>
                        </div>
                        <p class="text-xs text-slate-500 line-clamp-2">{{ $other['tagline'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</aside>
