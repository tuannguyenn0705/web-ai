@extends('layouts.app')

@section('title', 'AIApply Review (2026): Auto-Apply Job Agent, ATS Resume Builder, Pricing & 40% Student Discount')
@section('meta_description', 'In-depth 2026 review of AIApply (aiapply.co): test the Auto-Apply job agent across 20M+ listings, ATS resume & cover letter generator, Live Interview Buddy, pricing tiers, and 30%–40% promo discounts.')
@section('canonical', route($spotlight['route']))

@php
    $offers = [
        [
            'badge' => '30% OFF PROMO',
            'price' => 'Save 30%–50%',
            'title' => 'AIApply Auto-Apply & Pro Career Suite',
            'description' => 'Automate daily job submissions across 20M+ live listings with tailored ATS resumes, custom cover letters, and seasonal 30%–50% plan savings.',
            'perks' => [
                '76% of users land interviews in 10 days',
                'Unlimited ATS resume & cover letter tailoring',
                'Auto-Apply 100 / 250 / 750 credit bundles',
            ],
            'cta' => 'Start Auto-Applying Now',
            'url' => 'https://www.aiapply.co/auto-apply?via=aihubinsider',
            'note' => 'Seasonal 30% off & annual bundle discounts active',
        ],
        [
            'badge' => '40% STUDENT OFF',
            'price' => '40% Discount',
            'title' => 'Verified Student & Graduate 40% Discount',
            'description' => 'University students and recent graduates unlock an exclusive 40% checkout promo code for AIApply resume, cover letter, and job tools.',
            'perks' => [
                'Instant verification with school/university email',
                'Ideal for internships & entry-level job hunts',
                'Includes 50+ language resume translation',
            ],
            'cta' => 'Claim 40% Student Code',
            'url' => 'https://www.aiapply.co/students?via=aihubinsider',
            'note' => 'Verified via official aiapply.co/students portal',
        ],
        [
            'badge' => 'FREE TOOLS',
            'price' => '$0 / Free',
            'title' => 'Free ATS Resume Scanner & Career Toolkit',
            'description' => 'Test AIApply\'s free career utilities—including the Resume ATS Checker, Resume Optimizer, Expected Salary Calculator, and Follow-Up Email Generator.',
            'perks' => [
                'Instant ATS match score & keyword audit',
                '1-click LinkedIn profile to resume import',
                'Role-specific interview question generator',
            ],
            'cta' => 'Try Free ATS Tools',
            'url' => 'https://www.aiapply.co/tools?via=aihubinsider',
            'note' => 'No credit card required to test free utilities',
        ],
    ];

    $sidebarOffers = $offers;

    $faqs = [
        [
            'question' => 'How does AIApply\'s Auto-Apply feature actually work?',
            'answers' => [
                '<a href="https://www.aiapply.co/auto-apply?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow" class="underline font-semibold text-blue-600 hover:text-blue-700">AIApply Auto Apply</a> scans over 20 million live job listings across thousands of global job boards and corporate career portals every day to find roles that match your target titles, salary floor, and location preferences.',
                'Once you configure your preferences and approve your base resume profile, the agent automatically customizes your application materials and submits job applications on your behalf—helping 76% of active users land their first interview within 10 days.',
            ],
        ],
        [
            'question' => 'What is Interview Buddy and can it help during live remote interviews?',
            'answers' => [
                '<a href="https://www.aiapply.co/interview-answer-buddy?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow" class="underline font-semibold text-blue-600 hover:text-blue-700">Interview Buddy</a> is AIApply\'s real-time interview coaching assistant (rated 4.7/5 across 387+ reviews). It listens to interview questions during mock practice or live video calls and generates tailored talking points and structured STAR-method answers on your screen.',
                'After the session finishes, it provides a detailed post-interview performance breakdown so you can refine weak answers before your next round.',
            ],
        ],
        [
            'question' => 'How much does AIApply cost, and how are Auto-Apply credits structured?',
            'answers' => [
                'AIApply offers a Free Tier & Free Career Tools suite (<a href="https://www.aiapply.co/tools?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow" class="underline font-semibold text-blue-600 hover:text-blue-700">aiapply.co/tools</a>) so you can scan your resume for ATS compatibility, generate sample cover letters, and browse matches at $0.',
                'For power job seekers, the Pro Toolkit (unlimited ATS resumes & cover letters) runs around $29/month (or ~$144/year billed annually). Automated submissions run on flexible Auto-Apply tiers (such as 100 applications/mo at ~$49, 250 applications/mo at ~$99, or 750 quarterly), while Interview Buddy is available around $19/mo or $99/yr.',
            ],
        ],
        [
            'question' => 'How do I get the 40% Student Discount or 30% Seasonal Promo?',
            'answers' => [
                'Students and recent graduates can visit <a href="https://www.aiapply.co/students?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow" class="underline font-semibold text-blue-600 hover:text-blue-700">aiapply.co/students</a> and verify an active academic email address to receive a unique 40% off promo code for checkout.',
                'Non-students can take advantage of AIApply\'s seasonal sitewide banners (such as the 30% off Black Friday / seasonal plan discount) or save up to 50% by selecting annual or quarterly billing.',
            ],
        ],
        [
            'question' => 'Will ATS systems flag resumes and cover letters generated by AIApply?',
            'answers' => [
                'No—in fact, AIApply\'s <a href="https://www.aiapply.co/resume-builder?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow" class="underline font-semibold text-blue-600 hover:text-blue-700">AI Resume Builder</a> is engineered specifically to pass corporate Applicant Tracking Systems (Workday, Greenhouse, Lever, iCIMS).',
                'It uses clean, single-column or structured ATS-readable hierarchy and aligns your real work achievements with the exact competency keywords parsed from each target job description.',
            ],
        ],
        [
            'question' => 'Can AIApply translate my resume for international job applications?',
            'answers' => [
                'Yes. The built-in <a href="https://www.aiapply.co/resume-translator?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow" class="underline font-semibold text-blue-600 hover:text-blue-700">AI Resume Translator</a> converts and formats your resume into over 50 languages while preserving professional industry terminology—making cross-border remote and relocation job hunting effortless.',
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
                {{ $spotlight['name'] }} Product Information &amp; Hands-On Review
            </h2>
            <span class="text-xs text-slate-500">By AI Hub Editorial Team &bull; Updated {{ date('M d, Y') }}</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start mb-10">

            {{-- LEFT COLUMN (8 COLS) --}}
            <div class="lg:col-span-8 min-w-0">

                {{-- FTC Affiliate & Editorial Disclosure --}}
                <div class="bg-white border border-slate-200/80 rounded-xl px-4 py-3 text-xs text-slate-500 mb-6 leading-relaxed">
                    <strong class="text-slate-700 font-semibold">Transparency Disclosure:</strong>
                    AI Hub Insider independently evaluates AI career and productivity software. Some links on this page are partner referral links, meaning we may earn a commission at no extra cost to you. Read our
                    <a href="{{ route('pages.show', 'affiliate-disclosure') }}" class="text-slate-800 underline hover:text-blue-600 font-medium">Affiliate Disclosure</a>.
                </div>

                {{-- DEDICATED PARTNER BANNER SLOT (TOP) --}}
                @include('spotlights.partials._banner_slot', ['spotlight' => $spotlight, 'position' => 'top'])

                {{-- Main Editorial Article Card --}}
                <article class="bg-white rounded-2xl border border-slate-200/90 p-6 sm:p-10 shadow-2xs mb-8">
                    <div class="prose prose-lg max-w-none text-slate-700 leading-relaxed font-sans prose-headings:font-bold prose-headings:text-slate-950 prose-headings:tracking-tight prose-a:text-blue-600">

                        <h2 id="aiapply-overview" class="scroll-mt-28">What Is AIApply (aiapply.co)?</h2>
                        <p>
                            Sending out dozens of generic resumes every week only to get ghosted by corporate Applicant Tracking Systems (ATS) is the most exhausting part of modern job hunting. <strong>AIApply</strong> (<a href="{{ $spotlight['ref_url'] }}" target="_blank" rel="noopener noreferrer sponsored nofollow">aiapply.co</a>) replaces manual job board grinding with an automated AI career engine trusted by over <strong>2,064,300+ users</strong>—having helped candidates land more than <strong>739,400+ job interviews</strong> at companies including Microsoft, Meta, SpaceX, Deloitte, Stripe, and Dropbox.
                        </p>
                        <p>
                            Instead of using separate tools for resume writing, job tracking, and interview prep, AIApply connects every stage of the hiring funnel: scanning <strong>20M+ live job listings</strong>, tailoring your resume and cover letter to each specific job description, submitting applications automatically, and coaching you live during interviews. According to platform metrics, <strong>76% of users land an interview within their first 10 days</strong>.
                        </p>

                        <h2 id="aiapply-features" class="scroll-mt-28">Core AI Modules &amp; Career Automation Features</h2>
                        <ul>
                            <li><strong>Auto Apply Agent (<a href="https://www.aiapply.co/auto-apply?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow">aiapply.co/auto-apply</a>):</strong> Continuously matches your profile against 20M+ global openings and submits tailored applications automatically on your behalf (with over 372,200+ roles applied to recently).</li>
                            <li><strong>ATS-Optimized AI Resume Builder (<a href="https://www.aiapply.co/resume-builder?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow">aiapply.co/resume-builder</a>):</strong> Generates role-specific resumes from scratch or via 1-click LinkedIn import, highlighting the exact skills and metrics recruiters filter for.</li>
                            <li><strong>Instant AI Cover Letter Generator (<a href="https://www.aiapply.co/cover-letter-generator?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow">aiapply.co/cover-letter-generator</a>):</strong> Crafts persuasive, job-aligned cover letters in seconds without generic boilerplate fluff.</li>
                            <li><strong>Live Interview Buddy (<a href="https://www.aiapply.co/interview-answer-buddy?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow">aiapply.co/interview-answer-buddy</a>):</strong> Real-time desktop and screen interview copilot (4.7/5 rating) that provides live answer prompts during interviews plus detailed post-interview feedback.</li>
                            <li><strong>50+ Language Resume Translator &amp; Free ATS Tools (<a href="https://www.aiapply.co/tools?via=aihubinsider" target="_blank" rel="noopener noreferrer sponsored nofollow">aiapply.co/tools</a>):</strong> Translate resumes for international roles, run free ATS keyword scans, calculate expected salary bands, and generate follow-up emails.</li>
                        </ul>
                    </div>

                    {{-- PARAMETER & PERFORMANCE SCORECARD --}}
                    @include('spotlights.partials._scorecard', ['spotlight' => $spotlight])

                    {{-- IN-ARTICLE OFFER CARDS --}}
                    @include('spotlights.partials._offer_cards', ['spotlight' => $spotlight, 'offers' => $offers])

                    <div id="comparison-matrix" class="prose prose-lg max-w-none text-slate-700 leading-relaxed font-sans prose-headings:font-bold prose-headings:text-slate-950 scroll-mt-28">
                        <h2>AIApply Plans, Auto-Apply Tiers &amp; Add-Ons Breakdown</h2>
                        <div class="overflow-x-auto my-6">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Plan / Module</th>
                                        <th>Typical Pricing</th>
                                        <th>Core Allowance</th>
                                        <th>Best For</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Free Career Tools</strong></td>
                                        <td>$0 (Free Access)</td>
                                        <td>ATS Checker, Salary &amp; Follow-Up Tools</td>
                                        <td>Testing resume match scores &amp; basic job board search</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pro Career Toolkit</strong></td>
                                        <td>~$29/mo (or ~$144/yr)</td>
                                        <td>Unlimited Tailored Resumes &amp; Cover Letters</td>
                                        <td>Active applicants customizing materials per job</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Auto-Apply Credits</strong></td>
                                        <td>~$49 – $99/mo (or $199/qtr)</td>
                                        <td>100 / 250 / 750 Automated Job Submissions</td>
                                        <td>High-volume job seekers scaling daily applications</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Interview Buddy</strong></td>
                                        <td>~$19/mo (or ~$99/yr)</td>
                                        <td>Live Real-Time Interview Copilot &amp; Feedback</td>
                                        <td>Candidates preparing for technical &amp; behavioral rounds</td>
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
                                What We Liked
                            </h3>
                            <ul class="space-y-2 text-xs sm:text-sm text-emerald-950">
                                <li>• Combines Auto-Apply, ATS Resume Builder, Cover Letters, and Live Interview Buddy in one ecosystem.</li>
                                <li>• Massive 20M+ job aggregation engine with role-fit scoring (e.g., 89/100 match breakdown).</li>
                                <li>• Generous 40% verified student discount plus 30% seasonal &amp; annual bundle savings.</li>
                                <li>• Free standalone tools (ATS scanner, salary calculator, LinkedIn-to-resume converter).</li>
                            </ul>
                        </div>

                        <div class="rounded-2xl bg-rose-50/50 border border-rose-200/80 p-5">
                            <h3 class="text-sm font-extrabold text-rose-900 uppercase tracking-wider mb-3">
                                Keep in Mind
                            </h3>
                            <ul class="space-y-2 text-xs sm:text-sm text-rose-950">
                                <li>• Auto-Apply volume credits and Interview Buddy can be billed as separate add-ons from the base Resume Toolkit.</li>
                                <li>• Reviewing high-priority applications in hybrid/manual mode is still recommended for dream executive roles.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- FINAL VERDICT & HIGHLIGHTED REF CTA --}}
                    <div class="mt-8 rounded-2xl bg-gradient-to-r from-blue-50 via-indigo-50/70 to-blue-50 border border-blue-200/90 p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-6 shadow-xs">
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-widest text-blue-700 block mb-1">Final Verdict • 4.8 / 5.0</span>
                            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-950 mb-1.5">Ready to Land Interviews in Days Instead of Weeks?</h3>
                            <p class="text-xs sm:text-sm text-slate-600 max-w-xl">
                                Join 2,064,000+ job seekers on AIApply.co to automate daily applications, tailor ATS-ready resumes in seconds, and claim up to 30%–40% off today.
                            </p>
                        </div>
                        <a href="{{ $spotlight['primary_url'] ?? $spotlight['ref_url'] }}"
                           target="_blank"
                           rel="noopener noreferrer sponsored nofollow"
                           class="relative overflow-hidden group shrink-0 inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-extrabold text-sm shadow-[0_8px_20px_-4px_rgba(37,99,235,0.45)] hover:shadow-[0_12px_26px_-4px_rgba(37,99,235,0.6)] hover:-translate-y-0.5 transition-all duration-300 whitespace-nowrap">
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
@include('spotlights.partials._popup_modal', ['spotlight' => $spotlight])
@endsection
