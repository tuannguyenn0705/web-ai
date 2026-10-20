{{-- Footer --}}
<footer class="bg-gray-900 text-gray-300 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            {{-- About --}}
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-xl font-bold text-white mb-4">AI News Hub</h3>
                <p class="text-gray-400 mb-4">
                    Your premier destination for breaking artificial intelligence news, in-depth AI tool reviews, step-by-step tutorials, and exclusive software deals.
                </p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('posts.index', ['type' => 'news']) }}" class="hover:text-white transition">AI News</a></li>
                    <li><a href="{{ route('posts.index', ['type' => 'review']) }}" class="hover:text-white transition">Reviews</a></li>
                    <li><a href="{{ route('posts.index', ['type' => 'tutorial']) }}" class="hover:text-white transition">Tutorials</a></li>
                    <li><a href="{{ route('deals.index') }}" class="hover:text-white transition">Deals</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-white font-semibold mb-4">Contact</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li>
                        <span class="text-gray-500">Email:</span>
                        <span class="text-gray-300 ml-1">contact@ainewshub.com</span>
                    </li>
                    <li>
                        <span class="text-gray-500">Website:</span>
                        <span class="text-gray-300 ml-1">ainewshub.com</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Copyright --}}
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} AI News Hub. All rights reserved.</p>
        </div>
    </div>
</footer>
