{{-- Mobile Sticky Bottom Conversion Bar for Ads Traffic --}}
@php
    $btnTheme = match($spotlight['accent'] ?? 'blue') {
        'blue' => 'bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white shadow-[0_6px_16px_-3px_rgba(37,99,235,0.45)]',
        'violet' => 'bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-500 hover:to-purple-500 text-white shadow-[0_6px_16px_-3px_rgba(124,58,237,0.45)]',
        default => 'bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 text-white shadow-[0_6px_16px_-3px_rgba(13,148,136,0.45)]',
    };
@endphp

<div class="lg:hidden fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur-lg border-t border-slate-200 px-4 py-3 shadow-[0_-8px_25px_-5px_rgba(0,0,0,0.08)]">
    <div class="max-w-xl mx-auto flex items-center justify-between gap-3">
        <div class="min-w-0">
            <div class="flex items-center gap-1.5">
                <span class="text-sm font-extrabold text-slate-950 truncate">{{ $spotlight['name'] }}</span>
                <span class="text-[10px] font-bold px-1.5 py-0.5 rounded bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0">{{ $spotlight['rating'] }}</span>
            </div>
            <p class="text-[11px] text-slate-500 truncate">{{ $spotlight['offer_badge'] }}</p>
        </div>

        <a href="{{ $spotlight['ref_url'] }}"
           target="_blank"
           rel="noopener noreferrer sponsored nofollow"
           class="shrink-0 px-4 py-2.5 rounded-xl text-xs font-extrabold transition {{ $btnTheme }} whitespace-nowrap">
            {{ $spotlight['cta_primary'] }}
        </a>
    </div>
</div>
