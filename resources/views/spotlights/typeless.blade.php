@extends('layouts.app')

@section('title', 'Typeless Review (2026): AI Voice Dictation at 220 WPM, Pricing, $5 Credit & 50% Student Offer')
@section('meta_description', 'Complete 2026 review of Typeless (typeless.com): test 220 WPM AI voice dictation across macOS, Windows, iOS & Android, compare Free vs Pro ($12/mo), and claim the $5 referral credit or 50% student discount.')
@section('canonical', route($spotlight['route']))

@php
    $offers = [
        [
            'badge' => 'SAVE 60% YEARLY',
            'price' => '$12 / month',
            'title' => 'Typeless Pro Annual (60% Off Monthly Rate)',
            'description' => 'Unlock unlimited voice dictation, priority peak access, enhanced transcription accuracy, and multi-device cloud sync at $144/year instead of $30/mo.',
            'perks' => [
                'Unlimited words across macOS, Windows & Linux',
                'Priority server access & highest accuracy',
                'Team management & centralized billing',
            ],
            'cta' => 'Start Free & Save 60%',
            'url' => 'https://www.typeless.com/pricing?via=aihubb',
            'note' => 'Compare $12/mo annual vs $30/mo monthly',
        ],
        [
            'badge' => '$5 PRO CREDIT',
            'price' => '$5 Bonus Credit',
            'title' => 'Typeless Referral Bonus ($5 Toward Pro)',
            'description' => 'Register via a referral link to earn a $5 credit toward Typeless Pro on individual desktop plans, plus earn $5 for each friend who dictates 2,000+ words.',
            'perks' => [
                '$5 credit applied to Individual Pro upgrade',
                'Instant Free Plan onboarding ($0 upfront)',
                'Includes 100+ languages & Whisper Mode',
            ],
            'cta' => 'Claim $5 Pro Credit',
            'url' => 'https://www.typeless.com/referral?via=aihubb',
            'note' => 'Applies to individual desktop checkouts',
        ],
        [
            'badge' => '50% STUDENT OFF',
            'price' => '$6 / month*',
            'title' => 'Verified Student 50% Pro Discount',
            'description' => 'University and school students get 50% off Typeless Pro on desktop checkouts—making unlimited AI dictation just $6/mo billed annually.',
            'perks' => [
                'Verify easily with school/university email',
                'Full Pro unlimited dictation for essays & notes',
                'Zero data retention & private local history',
            ],
            'cta' => 'Verify Student Status',
            'url' => 'https://www.typeless.com/students?via=aihubb',
            'note' => '*50% off $12/mo annual Pro desktop rate',
        ],
    ];

    $sidebarOffers = $offers;

    $faqs = [
        [
            'question' => 'How is Typeless different from built-in Apple or Windows voice dictation?',
            'answers' => [
                'Built-in OS dictation converts every syllable literally—leaving behind awkward filler sounds ("um", "uh"), duplicated false starts, and unformatted walls of text.',
                '<a href="' . e($spotlight['ref_url']) . '" target="_blank" rel="noopener noreferrer sponsored nofollow" class="underline font-semibold text-teal-700 hover:text-teal-900">Typeless</a> adds an intelligent AI polishing layer on top of voice recognition. It automatically strips fillers, fixes self-corrections mid-sentence, builds clean bullet points or paragraphs, and matches the tone of the specific app you are typing into.',
            ],
        ],
        [
            'question' => 'How fast is Typeless compared to typing on a standard keyboard?',
            'answers' => [
                'On average, typing on a physical QWERTY keyboard runs around 45 words per minute (WPM). Natural human speech flows at roughly 220 WPM—meaning Typeless outputs finished prose around 4× faster than manual typing.',
                'For heavy writers, founders, engineers, and customer-facing teams, Typeless estimates this speed advantage saves roughly 1 full workday every week.',
            ],
        ],
        [
            'question' => 'Which devices, operating systems, and apps does Typeless work with?',
            'answers' => [
                'Typeless runs natively on macOS, Windows, and Linux desktops, and functions as an intelligent voice keyboard on both iOS and Android smartphones.',
                'Because it operates directly at your active cursor across your OS, it works smoothly inside Outlook, Gmail, Slack, WhatsApp, Notion, Google Docs, and web browsers—even adapting formality between work email and casual chat.',
            ],
        ],
        [
            'question' => 'How do I claim the $5 Referral Credit or 50% Student Discount?',
            'answers' => [
                'For the Referral Bonus: sign up through an individual referral link and install Typeless on desktop. Once a referred friend dictates at least 2,000 words, both sides earn a $5 credit toward Typeless Pro (valid on desktop checkouts, not App Store/Google Play billing).',
                'For Students: verify an active school or university email through the Typeless student program to unlock 50% off Typeless Pro on desktop—bringing annual billing down to just $6/month.',
            ],
        ],
        [
            'question' => 'Does Typeless store my audio or train AI models on my voice data?',
            'answers' => [
                'No. Typeless follows a zero cloud data retention policy for voice recordings and guarantees zero AI model training on customer speech data.',
                'Your dictation history remains stored locally on your device, backed by SOC 2, ISO 27001, GDPR, and enterprise HIPAA/BAA compliance options.',
            ],
        ],
        [
            'question' => 'What is included in the Free Plan vs. Pro Annual ($12/mo)?',
            'answers' => [
                'Every new account starts automatically on the $0 Free Plan with a recurring weekly word allowance—and includes all core intelligent cleanup features, 100+ languages, real-time translation, "Ask Anything" voice edits, and Whisper Mode.',
                'Upgrading to Pro Annual ($12/member/month billed annually at $144/yr, saving 60% off the $30 monthly rate) removes weekly word caps, adds multi-device cloud sync, enhanced accuracy, and priority access during peak hours.',
            ],
        ],
    ];
@endphp

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

    {{-- ======================================================== --}}
    {{-- BLOCK 1: TOOLIFY-STYLE PRODUCT PROFILE & SPEC HEADER     --}}
    {{-- ======================================================== --}}
    @include('spotlights.partials._tool_header', ['spotlight' => $spotlight, 'offers' => $offers])

    {{-- ======================================================== --}}
    {{-- BLOCK 2: 2-COLUMN EDITORIAL REVIEW & STICKY SIDEBAR      --}}
    {{-- ======================================================== --}}
    <div id="product-information" class="scroll-mt-28">
        <div class="flex flex-wrap items-center justify-between gap-2 mb-5">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-950 tracking-tight">
                {{ $spotlight['name'] }} Product Information &amp; Hands-On Benchmark
            </h2>
            <span class="text-xs text-slate-500">By AI Hub Editorial Team &bull; Updated {{ date('M d, Y') }}</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start mb-10">

            {{-- LEFT COLUMN (8 COLS) --}}
            <div class="lg:col-span-8 min-w-0">

                {{-- FTC Disclosure Notice --}}
                <div class="bg-white border border-slate-200/80 rounded-xl px-4 py-3 text-xs text-slate-500 mb-6 leading-relaxed">
                    <strong class="text-slate-700 font-semibold">Transparency Disclosure:</strong>
                    AI Hub Insider independently tests AI productivity software. Some links on this page are partner referral links, meaning we may earn a commission or Pro credit at no extra cost to you. Read our
                    <a href="{{ route('pages.show', 'affiliate-disclosure') }}" class="text-slate-800 underline hover:text-teal-600 font-medium">Affiliate Disclosure</a>.
                </div>

                {{-- DEDICATED PARTNER BANNER SLOT (TOP) --}}
                @include('spotlights.partials._banner_slot', ['spotlight' => $spotlight, 'position' => 'top'])

                {{-- Main Editorial Article --}}
                <article class="bg-white rounded-2xl border border-slate-200/90 p-6 sm:p-10 shadow-2xs mb-8">
                    <div class="prose prose-lg max-w-none text-slate-700 leading-relaxed font-sans prose-headings:font-bold prose-headings:text-slate-950 prose-headings:tracking-tight prose-a:text-teal-700">

                        <h2 id="typeless-overview" class="scroll-mt-28">What Is Typeless?</h2>
                        <p>
                            Most people think faster than they type. Even fluent writers average around <strong>45 words per minute</strong> on a physical keyboard, whereas natural speech flows at <strong>220 words per minute</strong>. The reason voice dictation never caught on until recently is simple: built-in OS dictation writes down every <em>"um," "uh,"</em> false start, and formatting mistake literally.
                        </p>
                        <p>
                            <strong>Typeless</strong> (<a href="{{ $spotlight['ref_url'] }}" target="_blank" rel="noopener noreferrer sponsored nofollow">typeless.com</a>), crowned <strong>#1 Product of the Day on Product Hunt</strong> across both Desktop and Mobile launches, layers intelligent AI editing right on top of low-latency speech recognition. Whether you are replying in Outlook, Slack, Notion, or Chrome on macOS, Windows, Linux, iOS, or Android, Typeless inserts clean, publication-ready text directly at your cursor.
                        </p>

                        <h2 id="typeless-features" class="scroll-mt-28">Standout AI Features &amp; Privacy Architecture</h2>
                        <ul>
                            <li><strong>Automatic Filler &amp; Repetition Removal:</strong> Strips hesitations (<em>"um," "uh," "you know"</em>) and stuttered duplicate words before pasting text.</li>
                            <li><strong>Mid-Sentence Self-Correction Detection:</strong> Change your mind halfway through a sentence (e.g., <em>"Let's meet Tuesday—actually make that Thursday at 3 PM"</em>) and Typeless outputs only the final intent.</li>
                            <li><strong>Auto-Formatting &amp; Personal Dictionary:</strong> Automatically splits spoken items into numbered lists or clean paragraphs while remembering your custom names and industry jargon.</li>
                            <li><strong>Per-App Context &amp; Tone Adaptation:</strong> Writes formally when your cursor is inside corporate email, and keeps messages natural and concise inside WhatsApp or Slack.</li>
                            <li><strong>100+ Languages &amp; Real-Time Translation:</strong> Speak naturally in your native language and output polished writing in English or 100+ global languages—even handling seamless bilingual code-switching.</li>
                            <li><strong>"Ask Anything" &amp; Whisper Mode:</strong> Highlight any text and speak commands to shorten, rewrite, or query it; plus whisper accurately in quiet offices or shared workspaces.</li>
                            <li><strong>Zero Data Retention Privacy:</strong> Recordings are never stored in the cloud or used for AI model training, history stays local on your device, and infrastructure supports <strong>SOC 2, ISO 27001, GDPR, and HIPAA</strong> compliance.</li>
                        </ul>
                    </div>

                    {{-- PARAMETER & PERFORMANCE SCORECARD --}}
                    @include('spotlights.partials._scorecard', ['spotlight' => $spotlight])

                    {{-- IN-ARTICLE OFFER CARDS --}}
                    @include('spotlights.partials._offer_cards', ['spotlight' => $spotlight, 'offers' => $offers])

                    <div id="comparison-matrix" class="prose prose-lg max-w-none text-slate-700 leading-relaxed font-sans prose-headings:font-bold prose-headings:text-slate-950 scroll-mt-28">
                        <h2>Typeless Pricing Breakdown (Free vs. Pro vs. Enterprise)</h2>
                        <div class="overflow-x-auto my-6">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Plan Tier</th>
                                        <th>Pricing</th>
                                        <th>Word Allowance</th>
                                        <th>Best Included Perks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Free Plan</strong></td>
                                        <td>$0 / month</td>
                                        <td>Weekly limited words</td>
                                        <td>100+ languages, filler cleanup, translation, Whisper Mode</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pro (Annual)</strong></td>
                                        <td><strong>$12 / member / mo</strong> ($144/yr)</td>
                                        <td><strong>Unlimited words</strong></td>
                                        <td>Save 60% vs monthly, cloud sync, priority speed, team analytics</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pro (Monthly)</strong></td>
                                        <td>$30 / member / mo</td>
                                        <td><strong>Unlimited words</strong></td>
                                        <td>Flexible month-to-month individual or team billing</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Enterprise</strong></td>
                                        <td>Custom Pricing</td>
                                        <td><strong>Unlimited + SLA</strong></td>
                                        <td>SSO, SCIM/JIT provisioning, audit logs, BAA &amp; mandatory HIPAA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- MID-ARTICLE PARTNER BANNER SLOT --}}
                    @include('spotlights.partials._banner_slot', ['spotlight' => $spotlight, 'position' => 'mid'])

                    <div id="pros-cons" class="prose prose-lg max-w-none text-slate-700 leading-relaxed font-sans prose-headings:font-bold prose-headings:text-slate-950 scroll-mt-28">
                        <h2>Honest Pros &amp; Cons</h2>
                    </div>

                    {{-- Pros & Cons Cards --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 my-6">
                        <div class="rounded-2xl bg-emerald-50/60 border border-emerald-200/80 p-5">
                            <h3 class="text-sm font-extrabold text-emerald-900 uppercase tracking-wider mb-3">
                                What Stands Out
                            </h3>
                            <ul class="space-y-2 text-xs sm:text-sm text-emerald-950">
                                <li>• Writes up to 4× faster (220 WPM) while fixing self-corrections automatically.</li>
                                <li>• Generous $0 Free tier with 100+ languages and real-time translation included.</li>
                                <li>• Strict zero cloud audio retention and zero AI model training on user speech.</li>
                                <li>• Stackable savings: 60% annual discount, $5 referral bonus, or 50% student pricing.</li>
                            </ul>
                        </div>

                        <div class="rounded-2xl bg-rose-50/50 border border-rose-200/80 p-5">
                            <h3 class="text-sm font-extrabold text-rose-900 uppercase tracking-wider mb-3">
                                Watch Outs
                            </h3>
                            <ul class="space-y-2 text-xs sm:text-sm text-rose-950">
                                <li>• Monthly Pro ($30/mo) is steep if you skip annual billing ($12/mo).</li>
                                <li>• $5 referral credits and 50% student discounts apply only via desktop checkout (not App Store/Play Store).</li>
                            </ul>
                        </div>
                    </div>

                    {{-- FINAL VERDICT & HIGHLIGHTED REF CTA (Soft Eye-Friendly Card + Shimmer Button) --}}
                    <div class="mt-8 rounded-2xl bg-gradient-to-r from-teal-50 via-emerald-50/70 to-teal-50 border border-teal-200/90 p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-6 shadow-xs">
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-widest text-teal-800 block mb-1">Final Verdict • 4.9 / 5.0</span>
                            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-950 mb-1.5">Stop Typing Emails by Hand — Speak 4× Faster Today</h3>
                            <p class="text-xs sm:text-sm text-slate-600 max-w-xl">
                                Download Typeless free on any device, test 220 WPM AI dictation with zero data retention, and lock in 60% annual Pro savings when you upgrade.
                            </p>
                        </div>
                        <a href="{{ $spotlight['ref_url'] }}"
                           target="_blank"
                           rel="noopener noreferrer sponsored nofollow"
                           class="relative overflow-hidden group shrink-0 inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-gradient-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 text-white font-extrabold text-sm shadow-[0_8px_20px_-4px_rgba(13,148,136,0.45)] hover:shadow-[0_12px_26px_-4px_rgba(13,148,136,0.6)] hover:-translate-y-0.5 transition-all duration-300 whitespace-nowrap">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/25 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out pointer-events-none"></span>
                            <span>{{ $spotlight['cta_primary'] }}</span>
                        </a>
                    </div>
                </article>
            </div>

            {{-- RIGHT COLUMN (4 COLS): STICKY SIDEBAR --}}
            @include('spotlights.partials._sidebar', ['spotlight' => $spotlight, 'sidebarOffers' => $sidebarOffers, 'otherSpotlights' => $otherSpotlights])
        </div>
    </div>
</div>

{{-- ======================================================== --}}
{{-- BLOCK 3: DEDICATED INTERACTIVE FAQ (RIGHT ABOVE FOOTER)  --}}
{{-- ======================================================== --}}
@include('spotlights.partials._faq_section', ['spotlight' => $spotlight, 'faqs' => $faqs])

@include('spotlights.partials._mobile_sticky_cta', ['spotlight' => $spotlight])
@endsection
