{{-- Footer --}}
<footer class="bg-gray-900 text-gray-300 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            {{-- About --}}
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-xl font-bold text-white mb-4">🤖 AI News Hub</h3>
                <p class="text-gray-400 mb-4">
                    Cập nhật tin tức, review công cụ, và hướng dẫn mới nhất về trí tuệ nhân tạo.
                    Theo dõi chúng tôi để không bỏ lỡ bất kỳ thông tin quan trọng nào về AI.
                </p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-white font-semibold mb-4">Liên kết nhanh</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('posts.index', ['type' => 'news']) }}" class="hover:text-white transition">Tin tức AI</a></li>
                    <li><a href="{{ route('posts.index', ['type' => 'review']) }}" class="hover:text-white transition">Review</a></li>
                    <li><a href="{{ route('posts.index', ['type' => 'tutorial']) }}" class="hover:text-white transition">Hướng dẫn</a></li>
                    <li><a href="{{ route('posts.index', ['type' => 'update']) }}" class="hover:text-white transition">Cập nhật</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-white font-semibold mb-4">Liên hệ</h4>
                <ul class="space-y-2">
                    <li class="flex items-center space-x-2">
                        <span>📧</span>
                        <span>contact@ainewshub.com</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span>🌐</span>
                        <span>ainewshub.com</span>
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
