{{-- Toolify-Inspired Product Specification Header, Preview Frame, Navigation Tabs & Quick Offer Strip --}}
@php
    $palette = match($spotlight['accent'] ?? 'blue') {
        'blue' => [
            'primary_btn' => 'bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white shadow-[0_8px_20px_-4px_rgba(37,99,235,0.45)] hover:shadow-[0_12px_26px_-4px_rgba(37,99,235,0.6)]',
            'outline_btn' => 'bg-white text-blue-700 border-2 border-blue-600/80 hover:bg-blue-50 hover:border-blue-700',
            'star' => 'text-blue-600',
            'tag_primary' => 'bg-blue-50/80 text-blue-700 border-blue-200 hover:bg-blue-100/80',
            'tab_active' => 'border-blue-600 text-blue-700 font-bold',
            'tab_hover' => 'hover:text-blue-600',
            'quick_card_hover' => 'hover:border-blue-400 hover:shadow-[0_10px_25px_-5px_rgba(37,99,235,0.14)]',
            'quick_badge' => 'bg-blue-100 text-blue-800',
            'link_text' => 'text-blue-600 hover:text-blue-800',
        ],
        'violet' => [
            'primary_btn' => 'bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-500 hover:to-purple-500 text-white shadow-[0_8px_20px_-4px_rgba(124,58,237,0.45)] hover:shadow-[0_12px_26px_-4px_rgba(124,58,237,0.6)]',
            'outline_btn' => 'bg-white text-violet-700 border-2 border-violet-600/80 hover:bg-violet-50 hover:border-violet-700',
            'star' => 'text-violet-600',
            'tag_primary' => 'bg-violet-50/80 text-violet-700 border-violet-200 hover:bg-violet-100/80',
            'tab_active' => 'border-violet-600 text-violet-700 font-bold',
            'tab_hover' => 'hover:text-violet-600',
            'quick_card_hover' => 'hover:border-violet-400 hover:shadow-[0_10px_25px_-5px_rgba(124,58,237,0.14)]',
            'quick_badge' => 'bg-violet-100 text-violet-800',
            'link_text' => 'text-violet-600 hover:text-violet-800',
        ],
        default => [
            'primary_btn' => 'bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 text-white shadow-[0_8px_20px_-4px_rgba(13,148,136,0.45)] hover:shadow-[0_12px_26px_-4px_rgba(13,148,136,0.6)]',
            'outline_btn' => 'bg-white text-teal-700 border-2 border-teal-600/80 hover:bg-teal-50 hover:border-teal-700',
            'star' => 'text-teal-600',
            'tag_primary' => 'bg-teal-50/80 text-teal-800 border-teal-200 hover:bg-teal-100/80',
            'tab_active' => 'border-teal-600 text-teal-700 font-bold',
            'tab_hover' => 'hover:text-teal-600',
            'quick_card_hover' => 'hover:border-teal-400 hover:shadow-[0_10px_25px_-5px_rgba(13,148,136,0.14)]',
            'quick_badge' => 'bg-teal-100 text-teal-800',
            'link_text' => 'text-teal-700 hover:text-teal-900',
        ],
    };

    $primaryTargetUrl = $spotlight['primary_url'] ?? $spotlight['ref_url'];
    $secondaryTargetUrl = $spotlight['secondary_url'] ?? $spotlight['ref_url'];
@endphp

<div class="mb-10">
    {{-- Clean Editorial Breadcrumb Bar --}}
    <nav aria-label="Breadcrumb" class="bg-white border border-slate-200/90 rounded-2xl px-4 sm:px-5 py-2.5 shadow-2xs mb-5 flex items-center justify-between flex-wrap gap-3">
        <ol class="flex items-center flex-wrap gap-1.5 sm:gap-2 text-xs sm:text-sm">
            <li>
                <a href="{{ route('home') }}" class="px-2.5 py-1 rounded-lg font-medium text-slate-500 hover:text-slate-900 hover:bg-slate-100/80 transition">
                    Home
                </a>
            </li>
            <li class="text-slate-300 select-none font-light">/</li>
            <li>
                <a href="{{ route('posts.index', ['type' => 'review']) }}" class="px-2.5 py-1 rounded-lg font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/80 transition">
                    {{ $spotlight['category'] }}
                </a>
            </li>
            <li class="text-slate-300 select-none font-light">/</li>
            <li>
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-lg font-bold border {{ $palette['tag_primary'] }}">
                    @if(!empty($spotlight['logo']))
                        <img src="{{ asset($spotlight['logo']) }}" alt="" class="w-4 h-4 object-contain rounded-xs shrink-0">
                    @endif
                    <span>{{ $spotlight['name'] }}</span>
                </span>
            </li>
        </ol>

        <div class="hidden sm:flex items-center gap-2.5 text-xs text-slate-500">
            <span class="inline-flex items-center gap-1.5 font-medium text-slate-600">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                <span>Verified {{ $spotlight['specs']['Verified On'] ?? '2026' }}</span>
            </span>
            @if(!empty($spotlight['review_domain']))
                <span class="text-slate-200">|</span>
                <span class="font-mono font-semibold text-slate-600 bg-slate-50 border border-slate-200/80 px-2.5 py-0.5 rounded-md">
                    {{ $spotlight['review_domain'] }}
                </span>
            @endif
        </div>
    </nav>

    {{-- Top Toolify-Style Product Profile Card --}}
    <div class="bg-white rounded-3xl border border-slate-200/90 p-6 sm:p-8 lg:p-10 shadow-xs mb-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">

            {{-- LEFT (7 COLS): Tool Title, Open Site Button, Star Rating, Spec Sheet & Tag Pills --}}
            <div class="lg:col-span-7 min-w-0">
                {{-- Logo + Title + Standout Animated Visit Official Site Button --}}
                <div class="flex flex-wrap items-center gap-3.5 mb-3.5">
                    @if(!empty($spotlight['logo']))
                        <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-white border border-slate-200/90 shadow-2xs p-1.5 flex items-center justify-center shrink-0 overflow-hidden">
                            <img src="{{ asset($spotlight['logo']) }}"
                                 alt="{{ $spotlight['name'] }} Logo"
                                 class="w-full h-full object-contain rounded-xl">
                        </div>
                    @endif

                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-950 tracking-tight leading-tight">
                        {{ $spotlight['name'] }}
                    </h1>

                    <a href="{{ $spotlight['ref_url'] }}"
                       target="_blank"
                       rel="noopener noreferrer sponsored nofollow"
                       class="relative overflow-hidden group inline-flex items-center justify-center px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all duration-300 hover:-translate-y-0.5 hover:scale-[1.02] active:translate-y-0 {{ $palette['primary_btn'] }}">
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                        <span>Visit Official Site</span>
                    </a>

                    <span class="text-xs font-bold uppercase tracking-wider px-2.5 py-1 rounded-md {{ $palette['quick_badge'] }}">
                        {{ $spotlight['badge'] }}
                    </span>
                </div>

                {{-- 5-Star Rating & Review Meta Row --}}
                <div class="flex flex-wrap items-center gap-3 text-xs sm:text-sm text-slate-600 mb-6 pb-5 border-b border-slate-100">
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 {{ $palette['star'] }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                        <span class="font-extrabold text-slate-900 ml-1">{{ $spotlight['rating_num'] ?? '4.9' }}</span>
                    </div>
                    <span class="text-slate-300">|</span>
                    <span class="font-medium text-slate-700">{{ $spotlight['reviews_label'] ?? 'Editorial Review' }}</span>
                    <span class="text-slate-300">|</span>
                    <span class="text-slate-500">{{ $spotlight['offer_badge'] }}</span>
                </div>

                {{-- Structured Specification Table (Bảng Thông Số Kỹ Thuật) --}}
                <dl class="space-y-3 text-xs sm:text-sm mb-6">
                    @foreach(($spotlight['specs'] ?? []) as $specLabel => $specValue)
                        <div class="grid grid-cols-1 sm:grid-cols-12 gap-1 sm:gap-4 items-baseline">
                            <dt class="sm:col-span-4 font-bold text-slate-900">{{ $specLabel }}:</dt>
                            <dd class="sm:col-span-8 text-slate-600 leading-relaxed">{{ $specValue }}</dd>
                        </div>
                    @endforeach
                    <div class="grid grid-cols-1 sm:grid-cols-12 gap-1 sm:gap-4 items-baseline">
                        <dt class="sm:col-span-4 font-bold text-slate-900">Official Link:</dt>
                        <dd class="sm:col-span-8">
                            <a href="{{ $spotlight['ref_url'] }}"
                               target="_blank"
                               rel="noopener noreferrer sponsored nofollow"
                               class="font-bold underline {{ $palette['link_text'] }}">
                                https://{{ $spotlight['domain'] }}
                            </a>
                        </dd>
                    </div>
                </dl>

                {{-- Category & Feature Tag Pills (Each links to its specific destination page or section) --}}
                @if(!empty($spotlight['tags']))
                    <div class="flex flex-wrap items-center gap-2 pt-2">
                        @foreach($spotlight['tags'] as $idx => $tagItem)
                            @php
                                $tagLabel = is_array($tagItem) ? ($tagItem['label'] ?? '') : $tagItem;
                                $tagUrl = is_array($tagItem) ? ($tagItem['url'] ?? $spotlight['ref_url']) : $spotlight['ref_url'];
                                $isExternalTag = !str_starts_with($tagUrl, '#');
                            @endphp
                            <a href="{{ $tagUrl }}"
                               @if($isExternalTag) target="_blank" rel="noopener noreferrer sponsored nofollow" @endif
                               class="px-3.5 py-1 rounded-full text-xs font-medium border transition {{ $idx < 3 ? 'bg-slate-50 text-slate-700 border-slate-200 hover:border-slate-400' : $palette['tag_primary'] }}">
                                {{ $tagLabel }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- RIGHT (5 COLS): Website Screenshot Frame & Dual Specific Action Buttons --}}
            <div class="lg:col-span-5">
                <a href="{{ $spotlight['ref_url'] }}"
                   target="_blank"
                   rel="noopener noreferrer sponsored nofollow"
                   class="group block rounded-2xl border border-slate-200/90 overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 bg-slate-100">
                    {{-- Browser Top Bar --}}
                    <div class="bg-slate-100 border-b border-slate-200/90 px-3.5 py-2 flex items-center justify-between">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-rose-400"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                        </div>
                        <span class="text-[11px] font-mono text-slate-500 truncate max-w-[200px]">{{ $spotlight['domain'] }}</span>
                        <span class="text-[10px] font-bold text-slate-400 group-hover:text-slate-700 transition">Visit</span>
                    </div>

                    {{-- Preview Image --}}
                    <div class="aspect-[16/10] overflow-hidden bg-white relative">
                        @if(!empty($spotlight['preview_image']) && file_exists(public_path($spotlight['preview_image'])))
                            <img src="{{ asset($spotlight['preview_image']) }}"
                                 alt="{{ $spotlight['name'] }} Official English Interface Preview"
                                 class="w-full h-full object-cover object-top group-hover:scale-[1.03] transition-transform duration-500">
                        @endif
                    </div>
                </a>

                {{-- Dual Interactive Action Buttons Underneath Screenshot (Each Links to Its Specific Destination!) --}}
                <div class="mt-4 flex flex-wrap sm:flex-nowrap items-center justify-end gap-3">
                    <a href="{{ $primaryTargetUrl }}"
                       target="_blank"
                       rel="noopener noreferrer sponsored nofollow"
                       class="relative overflow-hidden group flex-1 inline-flex items-center justify-center px-5 py-3 rounded-xl text-xs sm:text-sm font-bold transition-all duration-300 hover:-translate-y-0.5 {{ $palette['primary_btn'] }}">
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                        <span>{{ $spotlight['cta_primary'] }}</span>
                    </a>

                    <a href="{{ $secondaryTargetUrl }}"
                       target="_blank"
                       rel="noopener noreferrer sponsored nofollow"
                       class="flex-1 inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all duration-200 hover:-translate-y-0.5 {{ $palette['outline_btn'] }}">
                        {{ $spotlight['cta_secondary'] }}
                    </a>
                </div>
            </div>

        </div>
    </div>

    {{-- Horizontal Section Tabs Navigation (Toolify Style) --}}
    <div class="border-b border-slate-200 mb-6">
        <nav class="flex items-center gap-6 sm:gap-8 overflow-x-auto text-xs sm:text-sm">
            <a href="#product-information" class="pb-3.5 border-b-2 whitespace-nowrap transition {{ $palette['tab_active'] }}">
                Product Information
            </a>
            <a href="#evaluation-scorecard" class="pb-3.5 border-b-2 border-transparent text-slate-600 font-semibold whitespace-nowrap transition {{ $palette['tab_hover'] }}">
                Evaluation Scorecard
            </a>
            <a href="#verified-offers" class="pb-3.5 border-b-2 border-transparent text-slate-600 font-semibold whitespace-nowrap transition {{ $palette['tab_hover'] }}">
                Pricing &amp; Verified Deals
            </a>
            <a href="#comparison-matrix" class="pb-3.5 border-b-2 border-transparent text-slate-600 font-semibold whitespace-nowrap transition {{ $palette['tab_hover'] }}">
                Comparison Matrix
            </a>
            <a href="#pros-cons" class="pb-3.5 border-b-2 border-transparent text-slate-600 font-semibold whitespace-nowrap transition {{ $palette['tab_hover'] }}">
                Pros &amp; Cons
            </a>
            <a href="#faq-section" class="pb-3.5 border-b-2 border-transparent text-slate-600 font-semibold whitespace-nowrap transition {{ $palette['tab_hover'] }}">
                FAQ
            </a>
        </nav>
    </div>

    {{-- Quick Offer & Highlight Mini-Cards Strip Below Tabs (Each Links to Its Specific Destination URL!) --}}
    @if(!empty($offers))
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            @foreach($offers as $qOffer)
                <a href="{{ $qOffer['url'] ?? $primaryTargetUrl }}"
                   target="_blank"
                   rel="noopener noreferrer sponsored nofollow"
                   class="group bg-white rounded-2xl border border-slate-200/90 p-4 shadow-2xs transition-all duration-200 hover:-translate-y-0.5 {{ $palette['quick_card_hover'] }}">
                    <div class="flex items-center justify-between gap-2 mb-1.5">
                        <span class="text-xs font-extrabold text-slate-900 group-hover:underline truncate">{{ $qOffer['title'] }}</span>
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded shrink-0 {{ $palette['quick_badge'] }}">{{ $qOffer['price'] }}</span>
                    </div>
                    <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed">{{ $qOffer['description'] }}</p>
                </a>
            @endforeach
        </div>
    @endif
</div>
