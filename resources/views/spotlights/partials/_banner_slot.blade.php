{{-- Dedicated Partner Banner Slot (Supports custom uploaded banner image in public/images/banners/ or refined soft-surface promo banner) --}}
@php
    $bannerRelPath = $spotlight['banner_image'] ?? '';
    $hasCustomBanner = $bannerRelPath !== '' && file_exists(public_path($bannerRelPath));
    $slotPosition = $position ?? 'top';
    $bannerUrl = $slotPosition === 'mid'
        ? ($spotlight['secondary_url'] ?? ($spotlight['primary_url'] ?? $spotlight['ref_url']))
        : ($spotlight['primary_url'] ?? $spotlight['ref_url']);
    $bannerCta = $slotPosition === 'mid'
        ? ($spotlight['cta_secondary'] ?? $spotlight['cta_primary'])
        : $spotlight['cta_primary'];
@endphp

<div class="not-prose my-7">
    @if($hasCustomBanner)
        <a href="{{ $bannerUrl }}"
           target="_blank"
           rel="noopener noreferrer sponsored nofollow"
           class="group block relative rounded-2xl overflow-hidden border border-slate-200/90 shadow-sm hover:shadow-xl transition-all duration-300 no-underline">
            <img src="{{ asset($bannerRelPath) }}"
                 alt="{{ $spotlight['name'] }} Partner Banner"
                 class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500">
            <span class="absolute top-3 right-3 px-2.5 py-1 rounded-full bg-slate-900/80 backdrop-blur-sm text-[10px] font-bold uppercase tracking-wider text-white">
                Partner Offer
            </span>
        </a>
    @else
        {{-- Soft, Easy-on-the-Eyes Editorial Promo Banner with High-Contrast Animated CTA Button --}}
        @if($spotlight['slug'] === 'iapply')
            <div class="relative rounded-2xl overflow-hidden bg-gradient-to-r from-blue-50/90 via-white to-indigo-50/90 p-6 sm:p-7 border border-blue-200/90 shadow-xs hover:shadow-md transition-all duration-300">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">
                    <div class="max-w-xl">
                        <span class="inline-block px-3 py-1 rounded-full bg-blue-100/90 border border-blue-200 text-[11px] font-bold uppercase tracking-wider text-blue-800 mb-2.5">
                            {{ $slotPosition === 'mid' ? '739,400+ Interviews Landed • 76% Within 10 Days' : 'Official Partner Highlight • AIApply.co' }}
                        </span>
                        <h3 class="text-lg sm:text-xl font-extrabold tracking-tight leading-snug mb-1.5 text-slate-950">
                            Stop Applying for Weeks — Start Interviewing in Days with AIApply
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                            Let AIApply scan 20M+ jobs, tailor ATS-optimized resumes &amp; cover letters for every role, auto-submit applications daily, and coach you live.
                        </p>
                    </div>
                    <div class="shrink-0 flex flex-col items-start md:items-end gap-1.5">
                        <a href="{{ $bannerUrl }}"
                           target="_blank"
                           rel="noopener noreferrer sponsored nofollow"
                           class="relative overflow-hidden group inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 !text-white font-extrabold text-sm shadow-[0_8px_20px_-4px_rgba(37,99,235,0.45)] hover:shadow-[0_12px_25px_-4px_rgba(37,99,235,0.6)] hover:-translate-y-0.5 transition-all duration-300 no-underline whitespace-nowrap">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                            <span>{{ $bannerCta }}</span>
                        </a>
                        <span class="text-[11px] text-slate-500 font-medium">30% Seasonal Off • 40% Student Discount</span>
                    </div>
                </div>
            </div>
        @elseif($spotlight['slug'] === 'anara')
            <div class="relative rounded-2xl overflow-hidden bg-gradient-to-r from-violet-50/90 via-white to-purple-50/90 p-6 sm:p-7 border border-violet-200/90 shadow-xs hover:shadow-md transition-all duration-300">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">
                    <div class="max-w-xl">
                        <span class="inline-block px-3 py-1 rounded-full bg-violet-100/90 border border-violet-200 text-violet-800 text-[11px] font-bold uppercase tracking-wider mb-2.5">
                            {{ $slotPosition === 'mid' ? 'Enterprise No-Code Architecture Walkthrough' : 'Official Partner Highlight • Anara.ai' }}
                        </span>
                        <h3 class="text-lg sm:text-xl font-extrabold tracking-tight leading-snug mb-1.5 text-slate-950">
                            Build Custom Enterprise Software in <span class="text-violet-700">Hours, Not Months</span>
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                            Turn natural language into production-ready Sales KPI Dashboards, Inventory Systems &amp; Vendor Portals — with 100% code ownership.
                        </p>
                    </div>
                    <div class="shrink-0 flex flex-col items-start md:items-end gap-1.5">
                        <a href="{{ $bannerUrl }}"
                           target="_blank"
                           rel="noopener noreferrer sponsored nofollow"
                           class="relative overflow-hidden group inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-500 hover:to-purple-500 !text-white font-extrabold text-sm shadow-[0_8px_20px_-4px_rgba(124,58,237,0.45)] hover:shadow-[0_12px_25px_-4px_rgba(124,58,237,0.6)] hover:-translate-y-0.5 transition-all duration-300 no-underline whitespace-nowrap">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                            <span>{{ $bannerCta }}</span>
                        </a>
                        <span class="text-[11px] text-slate-500 font-medium">Custom Pilot • Zero Vendor Lock-In</span>
                    </div>
                </div>
            </div>
        @else
            <div class="relative rounded-2xl overflow-hidden bg-gradient-to-r from-teal-50/90 via-white to-emerald-50/90 p-6 sm:p-7 border border-teal-200/90 shadow-xs hover:shadow-md transition-all duration-300">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">
                    <div class="max-w-xl">
                        <span class="inline-block px-3 py-1 rounded-full bg-teal-100/90 border border-teal-200 text-teal-800 text-[11px] font-bold uppercase tracking-wider mb-2.5">
                            #1 Product of the Day • 4× Faster Dictation
                        </span>
                        <h3 class="text-lg sm:text-xl font-extrabold tracking-tight leading-snug mb-1.5 text-slate-950">
                            Speak at 220 WPM &amp; Save 1 Full Workday Every Week with Typeless
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                            Start free on macOS, Windows, iOS &amp; Android — or unlock Annual Pro at 60% Off ($12/mo) + claim a $5 Referral Credit &amp; 50% Student Discount.
                        </p>
                    </div>
                    <div class="shrink-0 flex flex-col items-start md:items-end gap-1.5">
                        <a href="{{ $bannerUrl }}"
                           target="_blank"
                           rel="noopener noreferrer sponsored nofollow"
                           class="relative overflow-hidden group inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 !text-white font-extrabold text-sm shadow-[0_8px_20px_-4px_rgba(13,148,136,0.45)] hover:shadow-[0_12px_25px_-4px_rgba(13,148,136,0.6)] hover:-translate-y-0.5 transition-all duration-300 no-underline whitespace-nowrap">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                            <span>{{ $bannerCta }}</span>
                        </a>
                        <span class="text-[11px] text-slate-500 font-medium">$0 Free Tier • No Credit Card Needed</span>
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>
