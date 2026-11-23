{{-- Dedicated 1-Row (3-Column) Featured AI Spotlights Showcase on Homepage (Soft Surface + Shimmer Buttons) --}}
@if(!empty($spotlights) && count($spotlights) > 0)
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-6">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8 border-b border-gray-200 pb-4">
        <div>
            <span class="inline-block px-3 py-1 rounded-full bg-indigo-50 border border-indigo-200/80 text-indigo-700 text-[11px] font-bold uppercase tracking-wider mb-2.5">
                Featured AI Platform Spotlights
            </span>
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-950 font-serif tracking-tight">
                Handpicked AI Platforms Worth Trying in 2026
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                In-depth editorial reviews, parameter scorecards, and verified partner offers across AI job search, enterprise software, and voice productivity.
            </p>
        </div>
    </div>

    {{-- Single 3-Column Row --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-stretch">
        @foreach($spotlights as $item)
            @php
                $cardStyle = match($item['accent'] ?? 'blue') {
                    'blue' => [
                        'header_bg' => 'bg-gradient-to-br from-blue-50 via-indigo-50/70 to-white border-b border-blue-100',
                        'pill' => 'bg-blue-100 text-blue-800 border-blue-200',
                        'tag_text' => 'text-blue-700',
                        'hover_border' => 'hover:border-blue-400 hover:shadow-[0_14px_30px_-6px_rgba(37,99,235,0.14)]',
                        'primary_btn' => 'bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white shadow-[0_6px_16px_-3px_rgba(37,99,235,0.4)]',
                        'dot' => 'bg-blue-600',
                        'star' => 'text-blue-600',
                    ],
                    'violet' => [
                        'header_bg' => 'bg-gradient-to-br from-violet-50 via-purple-50/70 to-white border-b border-violet-100',
                        'pill' => 'bg-violet-100 text-violet-800 border-violet-200',
                        'tag_text' => 'text-violet-700',
                        'hover_border' => 'hover:border-violet-400 hover:shadow-[0_14px_30px_-6px_rgba(124,58,237,0.14)]',
                        'primary_btn' => 'bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-500 hover:to-purple-500 text-white shadow-[0_6px_16px_-3px_rgba(124,58,237,0.4)]',
                        'dot' => 'bg-violet-600',
                        'star' => 'text-violet-600',
                    ],
                    default => [
                        'header_bg' => 'bg-gradient-to-br from-teal-50 via-emerald-50/70 to-white border-b border-teal-100',
                        'pill' => 'bg-teal-100 text-teal-800 border-teal-200',
                        'tag_text' => 'text-teal-700',
                        'hover_border' => 'hover:border-teal-400 hover:shadow-[0_14px_30px_-6px_rgba(13,148,136,0.14)]',
                        'primary_btn' => 'bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 text-white shadow-[0_6px_16px_-3px_rgba(13,148,136,0.4)]',
                        'dot' => 'bg-teal-600',
                        'star' => 'text-teal-600',
                    ],
                };
            @endphp

            <article class="relative bg-white rounded-2xl border border-slate-200/90 shadow-2xs {{ $cardStyle['hover_border'] }} hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col justify-between group">
                <div>
                    {{-- Soft Editorial Brand Header --}}
                    <a href="{{ route($item['route']) }}" class="block p-5 sm:p-6 relative {{ $cardStyle['header_bg'] }}">
                        <div class="flex items-center justify-between gap-2 mb-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider border {{ $cardStyle['pill'] }}">
                                {{ $item['badge'] }}
                            </span>
                            <span class="text-xs font-extrabold text-slate-900 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 {{ $cardStyle['star'] }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                {{ $item['rating'] }}
                            </span>
                        </div>

                        <div class="flex items-center gap-3.5">
                            @if(!empty($item['logo']))
                                <div class="w-11 h-11 rounded-xl bg-white border border-slate-200/90 p-1.5 flex items-center justify-center shrink-0 shadow-2xs overflow-hidden">
                                    <img src="{{ asset($item['logo']) }}" alt="{{ $item['name'] }} Logo" class="w-full h-full object-contain rounded-lg">
                                </div>
                            @endif
                            <div class="min-w-0">
                                <h3 class="text-xl font-extrabold text-slate-950 tracking-tight leading-none mb-1">{{ $item['name'] }}</h3>
                                <span class="text-xs font-semibold block truncate {{ $cardStyle['tag_text'] }}">
                                    {{ $item['review_domain'] ?? $item['domain'] }}
                                </span>
                            </div>
                        </div>
                    </a>

                    {{-- Card Body --}}
                    <div class="p-5 sm:p-6">
                        <h4 class="text-sm sm:text-base font-bold text-slate-950 leading-snug mb-2 group-hover:underline transition">
                            <a href="{{ route($item['route']) }}">
                                {{ $item['tagline'] }}
                            </a>
                        </h4>

                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-4 line-clamp-3">
                            {{ $item['summary'] }}
                        </p>

                        <ul class="space-y-1.5 border-t border-slate-100 pt-3.5">
                            @foreach($item['highlights'] as $bullet)
                                <li class="flex items-center gap-2 text-xs text-slate-700 font-medium">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $cardStyle['dot'] }} shrink-0"></span>
                                    <span class="truncate">{{ $bullet }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Dual Action Footer: Internal Review + Animated Ref CTA --}}
                <div class="px-5 sm:px-6 pb-5 pt-2 flex items-center gap-2.5">
                    <a href="{{ route($item['route']) }}"
                       class="flex-1 inline-flex items-center justify-center px-3.5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-900 text-xs font-bold transition whitespace-nowrap">
                        Full Review
                    </a>

                    <a href="{{ $item['primary_url'] ?? $item['ref_url'] }}"
                       target="_blank"
                       rel="noopener noreferrer sponsored nofollow"
                       class="relative overflow-hidden group/cta flex-1 inline-flex items-center justify-center px-3.5 py-2.5 rounded-xl text-xs font-extrabold transition-all duration-300 hover:-translate-y-0.5 whitespace-nowrap {{ $cardStyle['primary_btn'] }}">
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover/cta:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                        <span>{{ $item['cta_primary'] }}</span>
                    </a>
                </div>
            </article>
        @endforeach
    </div>
</section>
@endif
