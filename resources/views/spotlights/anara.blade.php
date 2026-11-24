@extends('layouts.app')

@section('title', 'ANARA AI Review (2026): Build Custom Enterprise Software with Natural Language')
@section('meta_description', 'Comprehensive 2026 review of ANARA (anara.ai), the enterprise AI no-code platform that turns natural language into production-ready internal software in hours with full code ownership.')
@section('canonical', route($spotlight['route']))

@php
    $offers = [
        [
            'badge' => 'FREE WALKTHROUGH',
            'price' => 'Free Demo',
            'title' => 'Book Your Live 1:1 Enterprise Demo',
            'description' => 'Schedule a tailored architecture walkthrough to watch ANARA translate your team\'s internal workflows into live production software.',
            'perks' => [
                'Custom internal tool use-case mapping',
                'Security & deployment architecture Q&A',
                'Zero engineering backlog required',
            ],
            'cta' => 'Book Your Free Demo',
            'url' => 'https://anara.com?via=aihub',
            'note' => 'Official verified partner link',
        ],
        [
            'badge' => 'NO LOCK-IN',
            'price' => '100% Ownership',
            'title' => 'Full Source Code & IP Ownership',
            'description' => 'Unlike legacy no-code tools that trap logic inside proprietary SaaS walls, ANARA delivers production-ready code you fully own.',
            'perks' => [
                'Clean, auditable production code output',
                'Deploy inside your enterprise perimeter',
                'Extensible by your engineering team anytime',
            ],
            'cta' => 'Explore Full Ownership',
            'url' => 'https://anara.com?via=aihub',
            'note' => 'Built for enterprise security teams',
        ],
        [
            'badge' => 'RAPID BUILD',
            'price' => 'Hours, Not Months',
            'title' => 'Custom Enterprise Solution Pilot',
            'description' => 'Ship Sales KPI Dashboards, Inventory Management apps, or Employee Self-Service Portals in hours instead of multi-quarter sprints.',
            'perks' => [
                'Pre-tested enterprise UI & portal workflows',
                'Vendor, sales, & HR ops templates',
                'Dedicated enterprise onboarding support',
            ],
            'cta' => 'Request Enterprise Pilot',
            'url' => 'https://anara.com?via=aihub',
            'note' => 'No coding required to iterate',
        ],
    ];

    $sidebarOffers = $offers;

    $faqs = [
        [
            'question' => 'What kinds of internal software can enterprises build with ANARA?',
            'answers' => [
                'ANARA (<a href="' . e($spotlight['ref_url']) . '" target="_blank" rel="noopener noreferrer sponsored nofollow" class="underline font-semibold text-violet-600 hover:text-violet-700">anara.ai</a>) focuses specifically on custom operational software that typically clogs internal engineering queues—such as Sales KPI Dashboards, Inventory Management systems, Employee Self-Service Portals, and custom vendor request hubs.',
                'Instead of forcing teams to adapt to rigid off-the-shelf SaaS templates, business operators can describe their exact approval chains, data fields, and UI needs in natural language.',
            ],
        ],
        [
            'question' => 'Do we truly keep 100% ownership of the generated code?',
            'answers' => [
                'Yes. Full ownership is one of ANARA\'s defining promises compared to traditional drag-and-drop SaaS builders. When you build on legacy no-code tools, your logic stays trapped on vendor servers under perpetual subscription lock-in.',
                'ANARA generates clean, production-ready software with full ownership—meaning your engineering and security teams retain control over the underlying IP and can extend or deploy it according to internal IT standards.',
            ],
        ],
        [
            'question' => 'How fast can a team go from prompt to working production code?',
            'answers' => [
                'Traditional internal app development via agencies or overloaded product teams typically takes anywhere from 2 to 6+ months across scoping, UI sprints, QA, and deployment.',
                'With ANARA, enterprises move from an initial natural-language prompt to functional, production-ready software in hours rather than months.',
            ],
        ],
        [
            'question' => 'Is coding experience required for operations, sales, or HR managers?',
            'answers' => [
                'No coding is required. Non-technical domain leaders can outline business rules, workflows, and dashboard views directly in plain English.',
                'At the same time, because ANARA produces clean software rather than fragile visual spaghetti, software engineers can inspect, audit, and integrate generated apps effortlessly when needed.',
            ],
        ],
        [
            'question' => 'How does ANARA address enterprise security and IT governance?',
            'answers' => [
                'Unlike consumer "vibe coding" playgrounds built for quick hobby prototypes, ANARA positions enterprise-grade security at the core of its architecture.',
                'During your guided demo walkthrough, your security and IT leads can review isolation boundaries, access governance, and deployment models tailored to your company\'s compliance policies.',
            ],
        ],
        [
            'question' => 'How do pricing and enterprise pilots work when booking a demo?',
            'answers' => [
                'Because enterprise requirements vary widely across user seats, data connectors, and deployment scope, ANARA does not lock organizations into generic retail tiers.',
                'Booking a demo via <a href="' . e($spotlight['ref_url']) . '" target="_blank" rel="noopener noreferrer sponsored nofollow" class="underline font-semibold text-violet-600 hover:text-violet-700">anara.ai</a> gives your team a custom live walkthrough around your specific use case and scoping options for a pilot deployment.',
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
                {{ $spotlight['name'] }} Product Information &amp; Enterprise Review
            </h2>
            <span class="text-xs text-slate-500">By AI Hub Editorial Team &bull; Updated {{ date('M d, Y') }}</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start mb-10">

            {{-- LEFT COLUMN (8 COLS) --}}
            <div class="lg:col-span-8 min-w-0">

                {{-- FTC Disclosure Notice --}}
                <div class="bg-white border border-slate-200/80 rounded-xl px-4 py-3 text-xs text-slate-500 mb-6 leading-relaxed">
                    <strong class="text-slate-700 font-semibold">Transparency Disclosure:</strong>
                    AI Hub Insider independently evaluates enterprise AI software. Some links on this page are partner referral links, meaning we may earn a commission at no extra cost to you. Read our
                    <a href="{{ route('pages.show', 'affiliate-disclosure') }}" class="text-slate-800 underline hover:text-violet-600 font-medium">Affiliate Disclosure</a>.
                </div>

                {{-- DEDICATED PARTNER BANNER SLOT (TOP) --}}
                @include('spotlights.partials._banner_slot', ['spotlight' => $spotlight, 'position' => 'top'])

                {{-- Main Editorial Article --}}
                <article class="bg-white rounded-2xl border border-slate-200/90 p-6 sm:p-10 shadow-2xs mb-8">
                    <div class="prose prose-lg max-w-none text-slate-700 leading-relaxed font-sans prose-headings:font-bold prose-headings:text-slate-950 prose-headings:tracking-tight prose-a:text-violet-600">

                        <h2 id="anara-overview" class="scroll-mt-28">What Is ANARA (anara.ai)?</h2>
                        <p>
                            Every fast-growing company hits the same internal bottleneck: business, sales, supply chain, and HR leaders constantly need custom operational tools, while engineering teams are busy maintaining core customer-facing products. Waiting 3 to 6 months for an internal vendor portal or KPI dashboard slows revenue down.
                        </p>
                        <p>
                            <strong>ANARA</strong> (<a href="{{ $spotlight['ref_url'] }}" target="_blank" rel="noopener noreferrer sponsored nofollow">anara.ai</a>) solves this gap with an enterprise-first <strong>natural language software builder</strong>. Instead of wrestling with complex drag-and-drop logic blocks or proprietary scripting, teams describe what they need in plain language—and ANARA generates <strong>production-ready software in hours, not months</strong>.
                        </p>

                        <h2 id="anara-usecases" class="scroll-mt-28">Key Capabilities &amp; Enterprise Use Cases</h2>
                        <ul>
                            <li><strong>Dashboard for Sales KPIs:</strong> Spin up real-time executive and regional revenue trackers without pulling backend engineers off product sprints.</li>
                            <li><strong>Inventory Management Systems:</strong> Build custom stock-level monitors, warehouse approval flows, and vendor restock alerts aligned to your exact SKU rules.</li>
                            <li><strong>Employee Self-Service Portals:</strong> Centralize internal requests, onboarding checklists, and role-based access in a secure corporate portal.</li>
                            <li><strong>Full Code &amp; IP Ownership:</strong> Unlike closed no-code ecosystems that lock your business logic into endless per-seat SaaS rent, ANARA emphasizes full ownership of production-ready code.</li>
                            <li><strong>Enterprise-Grade Security First:</strong> Designed specifically for organizational compliance, data governance, and non-technical operators working alongside IT governance.</li>
                        </ul>
                    </div>

                    {{-- PARAMETER & PERFORMANCE SCORECARD --}}
                    @include('spotlights.partials._scorecard', ['spotlight' => $spotlight])

                    {{-- IN-ARTICLE OFFER CARDS --}}
                    @include('spotlights.partials._offer_cards', ['spotlight' => $spotlight, 'offers' => $offers])

                    <div id="comparison-matrix" class="prose prose-lg max-w-none text-slate-700 leading-relaxed font-sans prose-headings:font-bold prose-headings:text-slate-950 scroll-mt-28">
                        <h2>ANARA vs. Traditional Agencies vs. Legacy No-Code</h2>
                        <div class="overflow-x-auto my-6">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Evaluation Criteria</th>
                                        <th>ANARA (anara.ai)</th>
                                        <th>Traditional Dev / Agency</th>
                                        <th>Legacy Drag-and-Drop SaaS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>Time to Production</strong></td>
                                        <td><strong>Hours, not months</strong></td>
                                        <td>2 – 6+ months</td>
                                        <td>Weeks of manual setup</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Coding Required</strong></td>
                                        <td><strong>None (Natural Language)</strong></td>
                                        <td>Full engineering team</td>
                                        <td>Visual wiring &amp; formulas</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Code Ownership</strong></td>
                                        <td><strong>Full ownership</strong></td>
                                        <td>Full ownership</td>
                                        <td>Locked to vendor platform</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Enterprise Security</strong></td>
                                        <td><strong>Built-in enterprise architecture</strong></td>
                                        <td>Custom-built per project</td>
                                        <td>Often gated behind high tiers</td>
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
                                Strengths
                            </h3>
                            <ul class="space-y-2 text-xs sm:text-sm text-emerald-950">
                                <li>• Compresses internal tool delivery from months down to hours.</li>
                                <li>• Full code ownership eliminates long-term SaaS vendor lock-in.</li>
                                <li>• Designed for complex enterprise workflows (Sales KPIs, Inventory, Portals).</li>
                                <li>• Empowers operations &amp; non-coding leaders while keeping IT security intact.</li>
                            </ul>
                        </div>

                        <div class="rounded-2xl bg-rose-50/50 border border-rose-200/80 p-5">
                            <h3 class="text-sm font-extrabold text-rose-900 uppercase tracking-wider mb-3">
                                Considerations
                            </h3>
                            <ul class="space-y-2 text-xs sm:text-sm text-rose-950">
                                <li>• Tailored for business/enterprise teams rather than solo hobbyists looking for a $5 consumer app.</li>
                                <li>• Onboarding starts via a guided 1:1 enterprise demo rather than public self-serve checkout.</li>
                            </ul>
                        </div>
                    </div>

                    {{-- FINAL VERDICT & HIGHLIGHTED REF CTA (Soft Eye-Friendly Card + Shimmer Button) --}}
                    <div class="mt-8 rounded-2xl bg-gradient-to-r from-violet-50 via-purple-50/70 to-violet-50 border border-violet-200/90 p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-6 shadow-xs">
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-widest text-violet-700 block mb-1">Final Verdict • 4.9 / 5.0</span>
                            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-950 mb-1.5">Turn Your Next Internal Tool Idea Into Production Software</h3>
                            <p class="text-xs sm:text-sm text-slate-600 max-w-xl">
                                Book a live enterprise walkthrough on Anara.ai and discover how natural language eliminates engineering bottlenecks in hours, not months.
                            </p>
                        </div>
                        <a href="{{ $spotlight['primary_url'] ?? $spotlight['ref_url'] }}"
                           target="_blank"
                           rel="noopener noreferrer sponsored nofollow"
                           class="relative overflow-hidden group shrink-0 inline-flex items-center justify-center px-6 py-3.5 rounded-xl bg-gradient-to-r from-violet-600 to-purple-600 hover:from-violet-500 hover:to-purple-500 text-white font-extrabold text-sm shadow-[0_8px_20px_-4px_rgba(124,58,237,0.45)] hover:shadow-[0_12px_26px_-4px_rgba(124,58,237,0.6)] hover:-translate-y-0.5 transition-all duration-300 whitespace-nowrap">
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
