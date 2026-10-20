{{-- HakoReview-style Deal Card Component --}}
<article class="bg-white rounded-2xl border border-gray-200/90 p-6 shadow-xs hover:shadow-md transition duration-200 flex flex-col justify-between">
    <div>
        {{-- Top Section: Left Square Thumbnail + Right "Deal" & "DISCOUNT DEAL" --}}
        <div class="flex items-start justify-between gap-4 pb-5 mb-4 border-b border-gray-100">
            {{-- Left Square Image (80x80px) --}}
            <a href="{{ $deal->affiliate_url }}"
               target="_blank"
               rel="noopener noreferrer"
               class="w-20 h-20 rounded-md overflow-hidden bg-stone-100 border border-gray-100 shrink-0 flex items-center justify-center group">
                @if($deal->image_url)
                    <img src="{{ $deal->image_url }}"
                         alt="{{ $deal->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-950 flex flex-col items-center justify-center text-white p-2 text-center">
                        <span class="text-xs font-extrabold tracking-wider uppercase text-orange-400">AI</span>
                        <span class="text-[10px] font-semibold text-slate-200 mt-0.5 leading-tight">DEAL</span>
                    </div>
                @endif
            </a>

            {{-- Right Red "Deal" Badge & "DISCOUNT DEAL" Subtitle --}}
            <div class="flex flex-col items-end text-right pt-1">
                <span class="inline-flex items-center justify-center bg-[#E11D48] text-white text-xs font-bold px-3.5 py-1.5 rounded-md leading-none">
                    {{ $deal->badge_text ?: 'Deal' }}
                </span>
                <span class="text-[11px] font-semibold tracking-wider text-gray-400 uppercase mt-2.5">
                    {{ $deal->sub_badge_text ?: 'DISCOUNT DEAL' }}
                </span>
            </div>
        </div>

        {{-- Middle Section: Bold Offer Title & Muted Description --}}
        <h3 class="text-[15px] sm:text-base font-bold text-gray-900 leading-snug mb-1.5 hover:text-[#E11D48] transition">
            <a href="{{ $deal->affiliate_url }}" target="_blank" rel="noopener noreferrer">
                {{ $deal->title }}
            </a>
        </h3>

        @if($deal->description)
            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed mb-5 line-clamp-2">
                {{ $deal->description }}
            </p>
        @else
            <div class="mb-5"></div>
        @endif
    </div>

    {{-- Bottom Section: Outlined "Shop Now" Button linking directly to affiliate ref URL --}}
    <div>
        <a href="{{ $deal->affiliate_url }}"
           target="_blank"
           rel="noopener noreferrer"
           class="inline-flex items-center justify-center px-4 py-1.5 bg-white border border-gray-300 rounded-md text-xs font-bold text-gray-800 hover:bg-gray-900 hover:text-white hover:border-gray-900 transition duration-200">
            {{ $deal->button_text ?: 'Shop Now' }}
        </a>
    </div>
</article>
