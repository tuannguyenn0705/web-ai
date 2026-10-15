<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed dữ liệu mẫu cho AI News Hub
     */
    public function run(): void
    {
        // === Tạo Admin User ===
        $admin = User::firstOrCreate(
            ['email' => 'adminaihub@gmail.com'],
            [
                'name' => 'Admin AI Hub',
                'password' => bcrypt('Tuan2006@'),
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@ainewshub.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // === Tạo Categories ===
        $categories = [
            ['name' => 'ChatGPT & OpenAI', 'slug' => 'chatgpt-openai', 'description' => 'Tin tức và cập nhật về ChatGPT, GPT-4, OpenAI', 'order' => 1],
            ['name' => 'Google AI', 'slug' => 'google-ai', 'description' => 'Gemini, Bard, Google DeepMind và các sản phẩm AI của Google', 'order' => 2],
            ['name' => 'AI Tools', 'slug' => 'ai-tools', 'description' => 'Review và hướng dẫn các công cụ AI', 'order' => 3],
            ['name' => 'AI trong Lập trình', 'slug' => 'ai-lap-trinh', 'description' => 'AI hỗ trợ coding: Copilot, Cursor, Claude', 'order' => 4],
            ['name' => 'AI Art & Design', 'slug' => 'ai-art-design', 'description' => 'Midjourney, DALL-E, Stable Diffusion', 'order' => 5],
            ['name' => 'Tin tức AI', 'slug' => 'tin-tuc-ai', 'description' => 'Cập nhật tin tức mới nhất về trí tuệ nhân tạo', 'order' => 6],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // === Tạo Tags ===
        $tagNames = ['ChatGPT', 'GPT-4', 'Gemini', 'Claude', 'Midjourney', 'Stable Diffusion', 'LLM',
            'Machine Learning', 'Deep Learning', 'NLP', 'Computer Vision', 'Prompt Engineering',
            'AI Agent', 'RAG', 'Fine-tuning', 'Open Source'];

        $tags = [];
        foreach ($tagNames as $name) {
            $tags[] = Tag::create(['name' => $name, 'slug' => Str::slug($name)]);
        }

        // === Tạo Posts mẫu ===
        $samplePosts = [
            [
                'title' => 'GPT-5 chính thức ra mắt: Những tính năng đột phá mới',
                'excerpt' => 'OpenAI vừa công bố GPT-5 với nhiều cải tiến vượt trội về khả năng suy luận, xử lý multimodal và tốc độ phản hồi.',
                'content' => '<p>OpenAI đã chính thức ra mắt GPT-5, phiên bản mới nhất của mô hình ngôn ngữ lớn hàng đầu thế giới.</p><h2>Những điểm nổi bật</h2><p>GPT-5 mang đến nhiều cải tiến đáng kể so với phiên bản tiền nhiệm...</p><ul><li>Khả năng suy luận logic vượt trội</li><li>Xử lý multimodal: văn bản, hình ảnh, âm thanh</li><li>Tốc độ phản hồi nhanh hơn 3 lần</li><li>Context window lên đến 1 triệu tokens</li></ul>',
                'category_id' => 1, 'type' => 'news', 'is_featured' => true,
            ],
            [
                'title' => 'Review Gemini 2.0: Đối thủ xứng tầm của GPT-5',
                'excerpt' => 'Google DeepMind ra mắt Gemini 2.0 với benchmark vượt trội trong nhiều lĩnh vực. Cùng đánh giá chi tiết.',
                'content' => '<p>Gemini 2.0 là bước nhảy vọt lớn của Google trong cuộc đua AI.</p><h2>Điểm benchmark</h2><p>Gemini 2.0 đạt điểm cao nhất trong các bài test MMLU, HumanEval và MATH.</p><h2>Tính năng mới</h2><p>Hỗ trợ xử lý video dài, tạo code và phân tích dữ liệu phức tạp.</p>',
                'category_id' => 2, 'type' => 'review', 'is_featured' => true,
            ],
            [
                'title' => 'Top 10 công cụ AI miễn phí cho dân văn phòng 2026',
                'excerpt' => 'Danh sách 10 công cụ AI miễn phí giúp tăng năng suất làm việc đáng kể cho dân văn phòng.',
                'content' => '<p>Trong năm 2026, có rất nhiều công cụ AI miễn phí mà bạn có thể sử dụng ngay.</p><h2>1. ChatGPT Free</h2><p>Phiên bản miễn phí của ChatGPT vẫn rất mạnh mẽ.</p><h2>2. Gamma AI</h2><p>Tạo slide thuyết trình chuyên nghiệp trong vài phút.</p>',
                'category_id' => 3, 'type' => 'tutorial', 'is_featured' => true,
            ],
            [
                'title' => 'Cursor AI: IDE thông minh nhất cho lập trình viên',
                'excerpt' => 'Review chi tiết Cursor AI - IDE tích hợp AI giúp viết code nhanh hơn gấp 10 lần.',
                'content' => '<p>Cursor AI đã thay đổi cách chúng ta viết code.</p><h2>Tính năng nổi bật</h2><p>Tab completion, multi-file editing, và chat trong IDE.</p>',
                'category_id' => 4, 'type' => 'review', 'is_featured' => false,
            ],
            [
                'title' => 'Hướng dẫn Prompt Engineering từ cơ bản đến nâng cao',
                'excerpt' => 'Làm thế nào để viết prompt hiệu quả cho ChatGPT, Claude và các mô hình AI khác.',
                'content' => '<p>Prompt Engineering là kỹ năng quan trọng nhất khi làm việc với AI.</p><h2>Chain of Thought</h2><p>Hướng dẫn AI suy nghĩ từng bước.</p><h2>Few-shot Learning</h2><p>Cung cấp ví dụ để AI hiểu rõ yêu cầu.</p>',
                'category_id' => 3, 'type' => 'tutorial', 'is_featured' => true,
            ],
            [
                'title' => 'Midjourney V7 ra mắt: Tạo ảnh AI chân thực như thật',
                'excerpt' => 'Midjourney V7 nâng tầm chất lượng hình ảnh AI lên một level mới với độ chân thực đáng kinh ngạc.',
                'content' => '<p>Midjourney V7 đánh dấu bước tiến lớn trong AI Art.</p><h2>Cải tiến chất lượng</h2><p>Hình ảnh tạo ra gần như không thể phân biệt với ảnh chụp thật.</p>',
                'category_id' => 5, 'type' => 'update', 'is_featured' => true,
            ],
            [
                'title' => 'AI Agent là gì? Tương lai của tự động hóa',
                'excerpt' => 'Tìm hiểu về AI Agent - xu hướng công nghệ nóng nhất 2026 và cách nó thay đổi mọi thứ.',
                'content' => '<p>AI Agent là chương trình AI có khả năng tự đưa ra quyết định và thực hiện hành động.</p><h2>Các loại AI Agent</h2><p>Simple Reflex, Model-based, Goal-based, và Learning Agents.</p>',
                'category_id' => 6, 'type' => 'news', 'is_featured' => false,
            ],
            [
                'title' => 'So sánh Claude 4 vs GPT-5: Ai là ông vua AI?',
                'excerpt' => 'Đánh giá chi tiết và so sánh hai mô hình AI mạnh nhất hiện tại: Claude 4 của Anthropic và GPT-5 của OpenAI.',
                'content' => '<p>Cuộc đua AI năm 2026 nóng hơn bao giờ hết.</p><h2>Khả năng coding</h2><p>Claude 4 dẫn đầu trong lập trình với benchmark SWE-bench.</p><h2>Suy luận logic</h2><p>GPT-5 có lợi thế trong các bài toán phức tạp.</p>',
                'category_id' => 6, 'type' => 'review', 'is_featured' => false,
            ],
        ];

        foreach ($samplePosts as $postData) {
            $post = Post::create(array_merge($postData, [
                'slug' => Str::slug($postData['title']),
                'user_id' => $admin->id,
                'status' => 'published',
                'published_at' => now()->subDays(rand(0, 30)),
                'views_count' => rand(100, 5000),
            ]));

            // Gắn random tags
            $post->tags()->attach(
                collect($tags)->random(rand(2, 5))->pluck('id')
            );
        }

        // === Tạo Settings ===
        Setting::set('site_name', 'AI News Hub');
        Setting::set('site_description', 'Cập nhật tin tức, review và hướng dẫn về AI mới nhất');
        Setting::set('posts_per_page', '12');
        Setting::set('contact_email', 'contact@ainewshub.com');
    }
}
