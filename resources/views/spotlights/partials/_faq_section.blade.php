{{-- Interactive Light/White FAQ Section (Positioned Outside Article Box, Right Above Footer) --}}
@php
    $faqUid = 'faq_' . ($spotlight['slug'] ?? 'item');
    $faqTheme = match($spotlight['accent'] ?? 'blue') {
        'blue' => [
            'border' => 'border-blue-600',
            'glow' => 'bg-blue-100/50',
            'active_bg' => 'from-blue-50/90 via-blue-50/50 to-white',
        ],
        'violet' => [
            'border' => 'border-violet-600',
            'glow' => 'bg-violet-100/50',
            'active_bg' => 'from-violet-50/90 via-violet-50/50 to-white',
        ],
        default => [
            'border' => 'border-teal-600',
            'glow' => 'bg-teal-100/50',
            'active_bg' => 'from-teal-50/90 via-teal-50/50 to-white',
        ],
    };
@endphp

<section id="faq-section" class="relative overflow-hidden bg-white text-slate-900 border-t border-slate-200/80 pt-14 pb-16 sm:pt-16 sm:pb-20 -mb-16 scroll-mt-24">
    {{-- Subtle Soft Ambient Tint --}}
    <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full blur-[120px] pointer-events-none {{ $faqTheme['glow'] }}"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        {{-- Section Header --}}
        <div class="mb-10">
            <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-950">FAQ</h2>
            <p class="text-sm sm:text-base text-slate-500 mt-2">
                Find answers to some of the most common questions about {{ $spotlight['name'] }}.
            </p>
        </div>

        {{-- 2-Column Split on Desktop, Dropdown Accordion on Mobile --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-start" id="{{ $faqUid }}">
            {{-- Left Column: Clickable Questions Stack --}}
            <div class="lg:col-span-5 space-y-2.5">
                @foreach($faqs as $idx => $faq)
                    @php $isFirst = $idx === 0; @endphp
                    <div class="faq-item-group">
                        <button type="button"
                                data-faq-index="{{ $idx }}"
                                aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                class="faq-trigger w-full text-left px-5 py-4 rounded-lg flex items-center justify-between gap-4 transition-all duration-200 cursor-pointer border-l-[3px] {{ $isFirst ? $faqTheme['border'] . ' bg-gradient-to-r ' . $faqTheme['active_bg'] . ' text-slate-950 font-semibold shadow-2xs ring-1 ring-inset ring-slate-200/80' : 'border-transparent bg-slate-50/90 hover:bg-slate-100/90 text-slate-600 hover:text-slate-950 font-medium' }}">
                            <span class="text-sm leading-snug">{{ $faq['question'] }}</span>
                            <span class="text-xs font-mono shrink-0 transition-transform duration-200 {{ $isFirst ? 'text-slate-950 rotate-90 lg:rotate-0' : 'text-slate-400' }}" data-faq-chevron>&gt;</span>
                        </button>

                        {{-- Mobile Dropdown Answer (Expands directly below question on mobile/tablet) --}}
                        <div data-faq-mobile-panel="{{ $idx }}"
                             class="lg:hidden overflow-hidden transition-all duration-200 {{ $isFirst ? 'block' : 'hidden' }}">
                            <div class="px-5 py-4 bg-slate-50/70 border-l-[3px] {{ $faqTheme['border'] }} text-sm text-slate-700 leading-relaxed space-y-3 mt-1 rounded-b-lg">
                                @foreach($faq['answers'] as $paragraph)
                                    <p>{!! $paragraph !!}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Right Column: Active Answer Panel (Desktop) --}}
            <div class="hidden lg:block lg:col-span-7 pt-1">
                @foreach($faqs as $idx => $faq)
                    @php $isFirst = $idx === 0; @endphp
                    <div data-faq-desktop-panel="{{ $idx }}"
                         class="space-y-4 text-[15px] text-slate-700 leading-relaxed {{ $isFirst ? 'block' : 'hidden' }}">
                        @foreach($faq['answers'] as $paragraph)
                            <p>{!! $paragraph !!}</p>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    const root = document.getElementById('{{ $faqUid }}');
    if (!root) return;

    const triggers = Array.from(root.querySelectorAll('.faq-trigger'));
    const desktopPanels = Array.from(root.querySelectorAll('[data-faq-desktop-panel]'));
    const mobilePanels = Array.from(root.querySelectorAll('[data-faq-mobile-panel]'));
    const activeBorderClass = @json($faqTheme['border']);
    const activeBgClasses = @json(explode(' ', $faqTheme['active_bg']));

    triggers.forEach((btn) => {
        btn.addEventListener('click', () => {
            const targetIdx = btn.getAttribute('data-faq-index');
            const isCurrentlyActive = btn.getAttribute('aria-expanded') === 'true';

            const isMobile = window.innerWidth < 1024;
            const nextStateActive = isMobile ? !isCurrentlyActive : true;

            triggers.forEach((otherBtn) => {
                const idx = otherBtn.getAttribute('data-faq-index');
                const chevron = otherBtn.querySelector('[data-faq-chevron]');
                const isTarget = idx === targetIdx && nextStateActive;

                otherBtn.setAttribute('aria-expanded', isTarget ? 'true' : 'false');

                if (isTarget) {
                    otherBtn.classList.remove('border-transparent', 'bg-slate-50/90', 'hover:bg-slate-100/90', 'text-slate-600', 'hover:text-slate-950', 'font-medium');
                    otherBtn.classList.add(activeBorderClass, 'bg-gradient-to-r', ...activeBgClasses, 'text-slate-950', 'font-semibold', 'shadow-2xs', 'ring-1', 'ring-inset', 'ring-slate-200/80');
                    if (chevron) {
                        chevron.classList.remove('text-slate-400');
                        chevron.classList.add('text-slate-950', 'rotate-90', 'lg:rotate-0');
                    }
                } else {
                    otherBtn.classList.remove(activeBorderClass, 'bg-gradient-to-r', ...activeBgClasses, 'text-slate-950', 'font-semibold', 'shadow-2xs', 'ring-1', 'ring-inset', 'ring-slate-200/80');
                    otherBtn.classList.add('border-transparent', 'bg-slate-50/90', 'hover:bg-slate-100/90', 'text-slate-600', 'hover:text-slate-950', 'font-medium');
                    if (chevron) {
                        chevron.classList.remove('text-slate-950', 'rotate-90', 'lg:rotate-0');
                        chevron.classList.add('text-slate-400');
                    }
                }
            });

            desktopPanels.forEach((panel) => {
                if (panel.getAttribute('data-faq-desktop-panel') === targetIdx) {
                    panel.classList.remove('hidden');
                    panel.classList.add('block');
                } else {
                    panel.classList.remove('block');
                    panel.classList.add('hidden');
                }
            });

            mobilePanels.forEach((panel) => {
                if (panel.getAttribute('data-faq-mobile-panel') === targetIdx && nextStateActive) {
                    panel.classList.remove('hidden');
                    panel.classList.add('block');
                } else {
                    panel.classList.remove('block');
                    panel.classList.add('hidden');
                }
            });
        });
    });
})();
</script>
