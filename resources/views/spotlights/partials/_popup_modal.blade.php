{{-- Editorial Scenic Offer Notification Modal (Inspired by framed scenic announcement banner UX, responsive across mobile & desktop) --}}
@php
    $popup = $spotlight['popup'] ?? null;
    $modalPalette = match($spotlight['accent'] ?? 'blue') {
        'blue' => [
            'frame_bg' => 'bg-[#0c233a] border-[#38bdf8]/35',
            'dot' => 'bg-sky-400',
            'ribbon_border' => 'border-[#1d4ed8]/25 bg-[#fffefb]/92',
            'ribbon_text' => 'text-[#163a70]',
            'ornament' => 'text-[#2563eb]',
            'card_border' => 'border-[#bfdbfe]/90',
            'icon_badge' => 'bg-gradient-to-br from-[#2563eb] to-[#1d4ed8]',
            'highlight_text' => 'text-[#153e75]',
            'pill_bg' => 'bg-[#1d4ed8] text-white',
            'notice_border' => 'border-[#cbd5e1]/90 bg-[#fffefb]/90',
            'notice_icon' => 'text-[#2563eb]',
            'cta_btn' => 'bg-gradient-to-r from-[#1d4ed8] via-[#2563eb] to-[#4338ca] hover:from-[#1e40af] hover:to-[#3730a3] shadow-[0_12px_28px_-6px_rgba(37,99,235,0.55)]',
        ],
        'violet' => [
            'frame_bg' => 'bg-[#1a152e] border-[#a78bfa]/35',
            'dot' => 'bg-violet-400',
            'ribbon_border' => 'border-[#6d28d9]/25 bg-[#fffefb]/92',
            'ribbon_text' => 'text-[#3b1c71]',
            'ornament' => 'text-[#7c3aed]',
            'card_border' => 'border-[#ddd6fe]/95',
            'icon_badge' => 'bg-gradient-to-br from-[#7c3aed] to-[#5b21b6]',
            'highlight_text' => 'text-[#4c1d95]',
            'pill_bg' => 'bg-[#6d28d9] text-white',
            'notice_border' => 'border-[#e2e8f0]/95 bg-[#fffefb]/90',
            'notice_icon' => 'text-[#7c3aed]',
            'cta_btn' => 'bg-gradient-to-r from-[#6d28d9] via-[#7c3aed] to-[#5b21b6] hover:from-[#5b21b6] hover:to-[#4c1d95] shadow-[0_12px_28px_-6px_rgba(109,40,217,0.52)]',
        ],
        default => [
            'frame_bg' => 'bg-[#082d2b] border-[#2dd4bf]/35',
            'dot' => 'bg-emerald-400',
            'ribbon_border' => 'border-[#0f766e]/25 bg-[#fffefb]/92',
            'ribbon_text' => 'text-[#0b4640]',
            'ornament' => 'text-[#0d9488]',
            'card_border' => 'border-[#99f6e4]/90',
            'icon_badge' => 'bg-gradient-to-br from-[#0d9488] to-[#0f766e]',
            'highlight_text' => 'text-[#0f524b]',
            'pill_bg' => 'bg-[#0f766e] text-white',
            'notice_border' => 'border-[#cbd5e1]/90 bg-[#fffefb]/90',
            'notice_icon' => 'text-[#0d9488]',
            'cta_btn' => 'bg-gradient-to-r from-[#0f766e] via-[#0d9488] to-[#059669] hover:from-[#115e59] hover:to-[#047857] shadow-[0_12px_28px_-6px_rgba(13,148,136,0.52)]',
        ],
    };
@endphp

@if($popup)
<div id="spotlight-offer-modal"
     role="dialog"
     aria-modal="true"
     aria-labelledby="spotlight-popup-heading"
     data-spotlight-slug="{{ $spotlight['slug'] }}"
     class="fixed inset-0 z-60 hidden items-center justify-center p-2.5 sm:p-5 overflow-y-auto bg-slate-950/70 backdrop-blur-xs opacity-0 transition-opacity duration-500 ease-[cubic-bezier(0.32,0.72,0,1)]">

    {{-- Framed Outer Modal Window (Double-Bezel Architecture) --}}
    <div id="spotlight-offer-dialog"
         class="relative w-full max-w-[780px] my-auto rounded-2xl sm:rounded-[1.35rem] border p-2 sm:p-3.5 shadow-[0_32px_90px_-15px_rgba(2,6,23,0.82)] scale-95 translate-y-3 opacity-0 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] {{ $modalPalette['frame_bg'] }}">

        {{-- Top Window Header Strip with Close (X) Button --}}
        <div class="flex items-center justify-between gap-3 px-2 sm:px-2.5 pb-2 sm:pb-2.5">
            <div class="flex items-center gap-2 min-w-0">
                <span class="w-2 h-2 rounded-full shrink-0 {{ $modalPalette['dot'] }}"></span>
                <span class="text-[11px] sm:text-xs font-medium text-white/80 truncate">
                    {{ $popup['eyebrow'] }} &bull; {{ $spotlight['name'] }}
                </span>
            </div>

            <button type="button"
                    data-spotlight-modal-close
                    aria-label="Close notification"
                    class="w-8 h-8 rounded-lg flex items-center justify-center text-white/75 hover:text-white hover:bg-white/15 active:scale-95 transition cursor-pointer shrink-0">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Inner Scenic Contextual Banner Canvas --}}
        <div class="relative rounded-xl sm:rounded-2xl overflow-hidden bg-[#fcfbf7] border border-white/50 shadow-[inset_0_1px_1px_rgba(255,255,255,0.6)]">

            {{-- Layer 1: Real Editorial Contextual Scenery Image --}}
            @if(!empty($popup['bg_image']) && file_exists(public_path($popup['bg_image'])))
                <img src="{{ asset($popup['bg_image']) }}"
                     alt="{{ $spotlight['name'] }} Editorial Background"
                     loading="eager"
                     fetchpriority="high"
                     class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none select-none">
            @endif

            {{-- Layer 2: Soft Center Daylight Diffusion (Preserves Left/Right Scenery on Desktop, Ensures Crisp Mobile Readability) --}}
            <div class="absolute inset-0 pointer-events-none bg-gradient-to-b from-[#fdfcf8]/88 via-[#fdfcf8]/92 to-[#fdfcf8]/86 sm:bg-[radial-gradient(ellipse_60%_84%_at_50%_50%,rgba(253,252,248,0.94)_0%,rgba(253,252,248,0.82)_54%,rgba(253,252,248,0.12)_100%)]"></div>

            {{-- Layer 3: Structured Editorial Banner Content --}}
            <div class="relative z-10 px-4 py-5 sm:px-9 sm:py-7 text-center">

                {{-- Brand Identity Lockup --}}
                <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/90 border border-slate-200/80 shadow-2xs mb-3">
                    @if(!empty($spotlight['logo']) && file_exists(public_path($spotlight['logo'])))
                        <img src="{{ asset($spotlight['logo']) }}"
                             alt="{{ $spotlight['name'] }} Logo"
                             class="w-5 h-5 sm:w-6 sm:h-6 rounded-md object-contain shrink-0">
                    @endif
                    <span class="text-xs sm:text-sm font-extrabold text-slate-900 tracking-tight">{{ $spotlight['name'] }}</span>
                    <span class="text-slate-300">|</span>
                    <span class="text-[11px] font-semibold text-slate-500">{{ $spotlight['domain'] }}</span>
                </div>

                {{-- Ornamental Framed Headline Ribbon --}}
                <div class="mb-2.5">
                    <div class="inline-flex items-center gap-2 sm:gap-3 px-4 sm:px-6 py-1.5 sm:py-2 rounded-xl border shadow-2xs {{ $modalPalette['ribbon_border'] }}">
                        <span class="text-xs sm:text-sm select-none {{ $modalPalette['ornament'] }}">&#10022;</span>
                        <h2 id="spotlight-popup-heading"
                            class="font-serif text-sm sm:text-xl font-bold tracking-wide uppercase {{ $modalPalette['ribbon_text'] }}">
                            {{ $popup['ribbon_title'] }}
                        </h2>
                        <span class="text-xs sm:text-sm select-none {{ $modalPalette['ornament'] }}">&#10022;</span>
                    </div>
                </div>

                {{-- Subtitle --}}
                <p class="max-w-lg mx-auto text-xs sm:text-[13.5px] text-slate-700 font-medium leading-relaxed mb-6 sm:mb-7">
                    {{ $popup['subtitle'] }}
                </p>

                {{-- Dual Framed Highlight Boxes (2 Columns on Tablet/Desktop with Subtle Divider, Stacked on Mobile) --}}
                <div class="relative max-w-xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6 mb-4 sm:mb-5">
                    {{-- Center Vertical Divider on Desktop --}}
                    <div class="hidden sm:block absolute top-2 bottom-2 left-1/2 -translate-x-1/2 w-px bg-slate-300/70 pointer-events-none"></div>

                    @foreach($popup['cards'] as $card)
                        <div class="relative rounded-xl bg-[#fffefb]/92 border px-4 pt-5 pb-3.5 shadow-[0_6px_18px_-6px_rgba(15,23,42,0.1)] {{ $modalPalette['card_border'] }}">
                            {{-- Floating Top Icon Badge --}}
                            <div class="absolute -top-3 left-1/2 -translate-x-1/2 w-8 h-6 rounded-md flex items-center justify-center text-white shadow-xs {{ $modalPalette['icon_badge'] }}">
                                @if(($card['icon'] ?? '') === 'tag')
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z"/><circle cx="7" cy="7" r="1.5"/></svg>
                                @elseif(($card['icon'] ?? '') === 'academic')
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10L12 5 2 10l10 5 10-5z"/><path d="M6 12v5c0 1.66 2.69 3 6 3s6-1.34 6-3v-5"/></svg>
                                @elseif(($card['icon'] ?? '') === 'bolt')
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                                @elseif(($card['icon'] ?? '') === 'shield')
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/></svg>
                                @elseif(($card['icon'] ?? '') === 'mic')
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="2" width="6" height="11" rx="3"/><path d="M19 10v1a7 7 0 01-14 0v-1M12 18v4M8 22h8"/></svg>
                                @else
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 010-5C11 2 12 7 12 7zM12 7h4.5a2.5 2.5 0 000-5C13 2 12 7 12 7z"/></svg>
                                @endif
                            </div>

                            <div class="text-lg sm:text-xl font-extrabold tracking-tight {{ $modalPalette['highlight_text'] }}">
                                {{ $card['highlight'] }}
                            </div>
                            <div class="text-xs sm:text-[13px] font-bold text-slate-800 mt-0.5">
                                {{ $card['label'] }}
                            </div>
                            <span class="inline-block mt-2 px-3 py-0.5 rounded-full text-[10.5px] sm:text-[11px] font-bold tracking-tight {{ $modalPalette['pill_bg'] }}">
                                {{ $card['pill'] }}
                            </span>
                        </div>
                    @endforeach
                </div>

                {{-- Trust & Social Proof Notice Pill --}}
                <div class="max-w-xl mx-auto rounded-xl border px-3.5 py-2 text-[11px] sm:text-xs text-slate-700 font-medium flex items-center justify-center gap-2 mb-4 sm:mb-5 shadow-2xs {{ $modalPalette['notice_border'] }}">
                    <svg class="w-4 h-4 shrink-0 {{ $modalPalette['notice_icon'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 16.8l-6.2 4.5 2.4-7.4L2 9.4h7.6L12 2z"/>
                    </svg>
                    <span>{{ $popup['notice'] }}</span>
                </div>

                {{-- Interactive Claim Bonus / Claim Offer CTA Button Inside the Banner --}}
                <div class="flex flex-col items-center">
                    <a href="{{ $popup['cta_url'] ?? $spotlight['ref_url'] }}"
                       target="_blank"
                       rel="noopener noreferrer sponsored nofollow"
                       data-spotlight-modal-cta
                       class="relative overflow-hidden group inline-flex items-center gap-3 pl-6 pr-2 py-2 sm:pl-7 sm:pr-2.5 sm:py-2.5 rounded-full text-white font-extrabold text-xs sm:text-sm transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] hover:-translate-y-0.5 active:scale-[0.98] no-underline {{ $modalPalette['cta_btn'] }}">
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                        <span>{{ $popup['cta_label'] }}</span>
                        <span class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/20 flex items-center justify-center transition-transform duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:translate-x-0.5 group-hover:-translate-y-0.5 group-hover:scale-105">
                            <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M7 17L17 7M8 7h9v9"/>
                            </svg>
                        </span>
                    </a>
                    <span class="text-[11px] text-slate-600 font-medium mt-2">
                        {{ $popup['cta_sub'] }}
                    </span>
                </div>
            </div>
        </div>

        {{-- Bottom Window Footer Bar with Dismiss Button --}}
        <div class="pt-2.5 sm:pt-3 flex items-center justify-center">
            <button type="button"
                    data-spotlight-modal-close
                    class="px-5 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 border border-white/15 text-xs font-semibold text-white/90 hover:text-white active:scale-95 transition cursor-pointer">
                Close
            </button>
        </div>
    </div>
</div>

<script>
(function () {
    const modal = document.getElementById('spotlight-offer-modal');
    const dialog = document.getElementById('spotlight-offer-dialog');
    if (!modal || !dialog) return;

    const closeButtons = modal.querySelectorAll('[data-spotlight-modal-close]');
    const ctaLink = modal.querySelector('[data-spotlight-modal-cta]');
    let isOpen = false;

    function openModal() {
        if (isOpen) return;
        isOpen = true;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.documentElement.classList.add('overflow-hidden');

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                modal.classList.add('opacity-100');
                dialog.classList.remove('scale-95', 'translate-y-3', 'opacity-0');
                dialog.classList.add('scale-100', 'translate-y-0', 'opacity-100');
            });
        });
    }

    function closeModal() {
        if (!isOpen) return;
        isOpen = false;
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        dialog.classList.remove('scale-100', 'translate-y-0', 'opacity-100');
        dialog.classList.add('scale-95', 'translate-y-3', 'opacity-0');
        document.documentElement.classList.remove('overflow-hidden');

        setTimeout(() => {
            if (!isOpen) {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        }, 420);
    }

    closeButtons.forEach((btn) => {
        btn.addEventListener('click', closeModal);
    });

    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && isOpen) {
            closeModal();
        }
    });

    if (ctaLink) {
        ctaLink.addEventListener('click', () => {
            setTimeout(closeModal, 180);
        });
    }

    const navEntry = performance.getEntriesByType && performance.getEntriesByType('navigation')[0];
    const isBackForward = navEntry && navEntry.type === 'back_forward';

    if (!isBackForward) {
        setTimeout(openModal, 220);
    }
})();
</script>
@endif
