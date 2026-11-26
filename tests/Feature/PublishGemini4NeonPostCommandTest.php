<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PublishGemini4NeonPostCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_publish_gemini_4_neon_command_creates_published_news_post_with_images_and_tags(): void
    {
        Storage::fake('public');

        $this->artisan('posts:publish-gemini-4-neon')
            ->assertExitCode(0);

        $post = Post::where('slug', 'gemini-4-neon-launches-globally-how-google-deepminds-coding-agent-redefines-high-speed-frontier-ai')->first();

        $this->assertNotNull($post);
        $this->assertSame('news', $post->type);
        $this->assertSame('published', $post->status);
        $this->assertTrue($post->is_featured);
        $this->assertSame('posts/gemini-4-neon-hero.jpg', $post->featured_image);
        $this->assertGreaterThanOrEqual(5, $post->tags()->count());

        Storage::disk('public')->assertExists('posts/gemini-4-neon-hero.jpg');
        Storage::disk('public')->assertExists('posts/content/gemini-4-neon-architecture.jpg');

        $newsIndexResponse = $this->get(route('posts.index', ['type' => 'news']));
        $newsIndexResponse->assertStatus(200);
        $newsIndexResponse->assertSee('Gemini 4 Neon Launches Globally');

        $showResponse = $this->get(route('posts.show', $post->slug));
        $showResponse->assertStatus(200);
        $showResponse->assertSee('Gemini 4 Neon Launches Globally');
        $showResponse->assertSee('gemini-4-neon-architecture.jpg');
        $showResponse->assertSee('58.6 (#1)');
        $showResponse->assertSee('$3.00');
        $showResponse->assertSee('$0.15');
    }
}
