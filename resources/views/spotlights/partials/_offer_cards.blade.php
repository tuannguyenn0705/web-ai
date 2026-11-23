{{-- In-Article Verified Offer Cards Grid (Ads-Ready Conversion Cards with Animated Shimmer Buttons) --}}
@php
    $accentStyles = match($spotlight['accent'] ?? 'blue') {
        'blue' => [
            'badge' => 'bg-blue-100 text-blue-800 border border-blue-200',
            'border_hover' => 'hover:border-blue-400 hover:shadow-[0_12px_28px_-6px_rgba(37,99,235,0.16)]',
            'btn' => 'bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 !text-white shadow-[0_6px_16px_-3px_rgba(37,99,235,0.4)]',
            'dot' => 'bg-blue-600',
        ],
        'violet' => [
            'badge' => 'bg-violet-100 text-violet-800 border border-violet-200',
            'border_hover' => 'hover:border-violet-400 hover:shadow-[0_12px_28px_-6px_rgba(124,58,237,0.16)]',
            'btn' => 'bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-500 hover:to-purple-500 !text-white shadow-[0_6px_16px_-3px_rgba(124,58,237,0.4)]',
            'dot' => 'bg-violet-600',
        ],
        default => [
            'badge' => 'bg-teal-100 text-teal-800 border border-teal-200',
            'border_hover' => 'hover:border-teal-400 hover:shadow-[0_12px_28px_-6px_rgba(13,148,136,0.16)]',
            'btn' => 'bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 !text-white shadow-[0_6px_16px_-3px_rgba(13,148,136,0.4)]',
            'dot' => 'bg-teal-600',
        ],
    };
@endphp

<section id="verified-offers" class="not-prose my-10 scroll-mt-28">
    <div class="flex flex-wrap items-center justify-between gap-2 mb-5">
        <div>
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 block">Verified Offers &amp; Incentives</span>
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-950 tracking-tight m-0">
                Best {{ $spotlight['name'] }} Deals &amp; Access Options
            </h2>
        </div>
        <span class="text-xs font-medium text-slate-400">Updated {{ date('M Y') }}</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($offers as $offer)
            <div class="relative bg-white rounded-2xl border border-slate-200/95 p-5 shadow-2xs {{ $accentStyles['border_hover'] }} hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between gap-2 pb-3.5 mb-3.5 border-b border-slate-100">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider {{ $accentStyles['badge'] }}">
                            {{ $offer['badge'] }}
                        </span>
                        <span class="text-xs font-extrabold text-slate-900">
                            {{ $offer['price'] }}
                        </span>
                    </div>

                    <h3 class="text-base font-bold text-slate-950 leading-snug mb-2">
                        {{ $offer['title'] }}
                    </h3>

                    <p class="text-xs text-slate-600 leading-relaxed mb-4">
                        {{ $offer['description'] }}
                    </p>

                    @if(!empty($offer['perks']))
                        <ul class="space-y-1.5 mb-5 list-none p-0 m-0">
                            @foreach($offer['perks'] as $perk)
                                <li class="flex items-start gap-2 text-[11.5px] text-slate-700">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $accentStyles['dot'] }} mt-1.5 shrink-0"></span>
                                    <span>{{ $perk }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="pt-3 border-t border-slate-100 space-y-2">
                    <a href="{{ $offer['url'] ?? $spotlight['ref_url'] }}"
                       target="_blank"
                       rel="noopener noreferrer sponsored nofollow"
                       class="relative overflow-hidden group/btn w-full inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 hover:-translate-y-0.5 no-underline {{ $accentStyles['btn'] }}">
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover/btn:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                        <span>{{ $offer['cta'] }}</span>
                    </a>
                    @if(!empty($offer['note']))
                        <p class="text-[10.5px] text-center text-slate-400 font-medium m-0">{{ $offer['note'] }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
