{{-- Professional 4-Column International Footer with FTC Affiliate Disclosure --}}
<footer class="bg-gray-950 text-gray-300 mt-16 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-14 pb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 border-b border-gray-800/80">
            
            {{-- Col 1: Brand & Editorial Mission (4 cols) --}}
            <div class="lg:col-span-4 space-y-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-xl bg-orange-600 flex items-center justify-center text-white font-bold text-xs">
                        AI
                    </div>
                    <span class="text-lg font-bold text-white tracking-tight">AI News Hub</span>
                </a>
                <p class="text-sm text-gray-400 leading-relaxed max-w-sm">
                    Independent artificial intelligence news, hands-on software benchmarks, practical tutorials, and verified promo codes for developers and creators worldwide.
                </p>
                <div class="pt-1 text-xs text-gray-400 space-y-1">
                    <p><span class="text-gray-500">Editorial Desk:</span> <a href="mailto:contact@ainewshub.com" class="text-gray-300 hover:text-white transition">contact@ainewshub.com</a></p>
                    <p><span class="text-gray-500">Partnerships:</span> <a href="mailto:partners@ainewshub.com" class="text-gray-300 hover:text-white transition">partners@ainewshub.com</a></p>
                </div>
            </div>

            {{-- Col 2: Explore Sections (2 cols) --}}
            <div class="lg:col-span-2">
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-4">Explore</h4>
                <ul class="space-y-2.5 text-sm text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="{{ route('posts.index', ['type' => 'news']) }}" class="hover:text-white transition">AI News</a></li>
                    <li><a href="{{ route('posts.index', ['type' => 'review']) }}" class="hover:text-white transition">Tool Reviews</a></li>
                    <li><a href="{{ route('posts.index', ['type' => 'tutorial']) }}" class="hover:text-white transition">Tutorials & Guides</a></li>
                    <li>
                        <a href="{{ route('deals.index') }}" class="hover:text-white transition inline-flex items-center gap-1.5">
                            <span>AI Deals</span>
                            <span class="bg-[#E11D48] text-white text-[10px] font-bold px-1.5 py-0.5 rounded leading-none">HOT</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Col 3: Popular Topics (3 cols) --}}
            <div class="lg:col-span-3">
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-4">Popular Topics</h4>
                <ul class="space-y-2.5 text-sm text-gray-400">
                    <li><a href="{{ route('categories.show', 'chatgpt-openai') }}" class="hover:text-white transition">ChatGPT & OpenAI</a></li>
                    <li><a href="{{ route('categories.show', 'google-ai') }}" class="hover:text-white transition">Google Gemini & DeepMind</a></li>
                    <li><a href="{{ route('categories.show', 'ai-tools') }}" class="hover:text-white transition">AI Productivity Tools</a></li>
                    <li><a href="{{ route('categories.show', 'ai-coding') }}" class="hover:text-white transition">AI for Coding & DevTools</a></li>
                    <li><a href="{{ route('categories.show', 'ai-art-design') }}" class="hover:text-white transition">Generative Art & Video</a></li>
                </ul>
            </div>

            {{-- Col 4: Company, Trust & Legal (3 cols) --}}
            <div class="lg:col-span-3">
                <h4 class="text-xs font-bold uppercase tracking-wider text-white mb-4">Company & Legal</h4>
                <ul class="space-y-2.5 text-sm text-gray-400">
                    <li><a href="{{ route('pages.show', 'about-us') }}" class="hover:text-white transition">About Us & Methodology</a></li>
                    <li><a href="{{ route('pages.show', 'contact') }}" class="hover:text-white transition">Contact & Advertise</a></li>
                    <li><a href="{{ route('pages.show', 'affiliate-disclosure') }}" class="hover:text-white transition">Affiliate Disclosure</a></li>
                    <li><a href="{{ route('pages.show', 'privacy-policy') }}" class="hover:text-white transition">Privacy Policy</a></li>
                    <li><a href="{{ route('pages.show', 'terms-of-service') }}" class="hover:text-white transition">Terms of Service</a></li>
                    <li><a href="{{ route('sitemap') }}" class="hover:text-white transition">XML Sitemap</a></li>
                </ul>
            </div>

        </div>

        {{-- FTC Affiliate Disclaimer & Copyright Bar --}}
        <div class="pt-8 flex flex-col gap-4 text-xs text-gray-500 leading-relaxed">
            <p>
                <strong class="text-gray-400">FTC Affiliate Disclosure:</strong>
                AI News Hub is reader-supported. When you buy software or claim discounts through links on our site, we may earn an affiliate commission at no additional cost to you. Our editorial reviews and benchmark ratings remain 100% independent.
            </p>
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pt-2 border-t border-gray-900 text-gray-500">
                <p>&copy; {{ date('Y') }} AI News Hub. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <a href="{{ route('pages.show', 'privacy-policy') }}" class="hover:text-gray-300 transition">Privacy</a>
                    <a href="{{ route('pages.show', 'terms-of-service') }}" class="hover:text-gray-300 transition">Terms</a>
                    <a href="{{ route('pages.show', 'affiliate-disclosure') }}" class="hover:text-gray-300 transition">Disclosure</a>
                    <a href="{{ route('pages.show', 'contact') }}" class="hover:text-gray-300 transition">Contact</a>
                </div>
            </div>
        </div>
    </div>
</footer>
