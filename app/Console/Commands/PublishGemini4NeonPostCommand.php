<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PublishGemini4NeonPostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:publish-gemini-4-neon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish or update the flagship news article covering Google DeepMind\'s Gemini 4 Neon model with editorial artwork.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $featuredStoragePath = $this->syncEditorialArtwork();

        $author = User::where('email', 'adminaihub@gmail.com')->first()
            ?? User::orderBy('id')->first();

        if (! $author) {
            $author = User::create([
                'name' => 'Admin AI Hub',
                'email' => 'adminaihub@gmail.com',
                'password' => Hash::make('Tuan2006@'),
                'email_verified_at' => now(),
            ]);
        }

        $category = Category::where('slug', 'google-ai')->first()
            ?? Category::where('slug', 'ai-coding')->first()
            ?? Category::first();

        if (! $category) {
            $category = Category::create([
                'name' => 'Google AI',
                'slug' => 'google-ai',
                'description' => 'Gemini, Google DeepMind, and Google AI ecosystem breakthroughs',
                'order' => 2,
                'is_active' => true,
            ]);
        }

        $title = 'Gemini 4 Neon Launches Globally: How Google DeepMind’s #1 Coding Agent Redefines High-Speed Frontier AI';
        $slug = 'gemini-4-neon-launches-globally-how-google-deepminds-coding-agent-redefines-high-speed-frontier-ai';
        $excerpt = 'An exhaustive technical breakdown of Google DeepMind’s Gemini 4 Neon (gemini-4-neon): how its Carbon-derived architecture, 1M unified long-decode window, four configurable thinking levels, and $3/$15 API pricing claim #1 on the Coding Agent Index.';

        $existingPost = Post::where('slug', $slug)->first();

        $post = Post::updateOrCreate(
            ['slug' => $slug],
            [
                'title' => $title,
                'excerpt' => $excerpt,
                'content' => $this->buildArticleContent(),
                'featured_image' => $featuredStoragePath,
                'category_id' => $category->id,
                'user_id' => $author->id,
                'status' => 'published',
                'type' => 'news',
                'is_featured' => true,
                'views_count' => $existingPost?->views_count ?? 148,
                'published_at' => $existingPost?->published_at ?? now(),
            ]
        );

        $tagNames = [
            'Gemini 4 Neon',
            'Gemini',
            'Google DeepMind',
            'AI Agent',
            'LLM',
            'Prompt Engineering',
        ];

        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $tag = Tag::firstOrCreate(
                ['slug' => Str::slug($tagName)],
                ['name' => $tagName]
            );
            $tagIds[] = $tag->id;
        }

        $post->tags()->sync($tagIds);

        $this->info('Published article successfully: '.$post->title);
        $this->line('URL: '.route('posts.show', $post->slug));

        return self::SUCCESS;
    }

    /**
     * Copy bundled editorial artwork from public/images/posts into the public storage disk.
     */
    protected function syncEditorialArtwork(): string
    {
        $heroSource = public_path('images/posts/gemini-4-neon-hero.jpg');
        $archSource = public_path('images/posts/gemini-4-neon-architecture.jpg');

        $heroTarget = 'posts/gemini-4-neon-hero.jpg';
        $archTarget = 'posts/content/gemini-4-neon-architecture.jpg';

        if (is_file($heroSource)) {
            Storage::disk('public')->put($heroTarget, (string) file_get_contents($heroSource));
        }

        if (is_file($archSource)) {
            Storage::disk('public')->put($archTarget, (string) file_get_contents($archSource));
        }

        return $heroTarget;
    }

    /**
     * Build the HTML content for the Gemini 4 Neon news article.
     */
    protected function buildArticleContent(): string
    {
        return <<<'HTML'
<p>On <strong>November 18, 2026</strong>, Google DeepMind officially released <strong>Gemini 4 Neon</strong> (<code>gemini-4-neon</code>) across Google AI Studio, Vertex AI, Google Antigravity, and the Gemini app. Arriving just weeks after October’s enterprise rollout of Gemini 4 Argon, Neon completes a critical missing link in Google’s chemical-element frontier lineup: an agile, Carbon-derived reasoning model that captures <strong>#1 overall on the Artificial Analysis Coding Agent Index (58.6)</strong> and <strong>#1 on Surge AI’s Tuesday@Work enterprise benchmark (71.6)</strong>—all while executing multi-turn workflows at roughly half the median task cost of rival flagship models.</p>

<p>For software engineering teams, data scientists, and enterprise AI architects who found lightweight models too shallow for multi-file debugging—yet found heavyweight research models too slow and expensive for iterative agent loops—Gemini 4 Neon resets the price-to-intelligence frontier. Below is our complete technical analysis of Neon’s architecture, configurable thinking tiers, verified head-to-head benchmarks, and API token economics.</p>

<h2 id="element-lineup">Where Gemini 4 Neon Fits in Google DeepMind’s Element Lineup</h2>

<p>With the Gemini 4 generation, Google DeepMind transitioned toward an explicit element-tiered family designed around real-world compute budgets and latency tolerances rather than one-size-fits-all model sizing:</p>

<ul>
    <li><strong>Gemini 4 Hydrogen:</strong> Engineered for ultra-low-latency, high-volume everyday execution, subagent fan-out, and instant UI responsiveness.</li>
    <li><strong>Gemini 4 Neon (<code>gemini-4-neon</code>):</strong> Adapted directly from Carbon’s frontier foundation, structurally streamlined for fast iterative tool use, repository-scale software engineering, financial spreadsheet modeling, and multi-source synthesis.</li>
    <li><strong>Gemini 4 Carbon:</strong> Google’s maximum-depth heavyweight reasoning engine built for exhaustive, multi-minute scientific verification, security-critical audits, and long-horizon architectural discovery.</li>
</ul>

<figure>
    <img src="/images/posts/gemini-4-neon-architecture.jpg" alt="Gemini 4 Model Family Architecture: Hydrogen, Neon, and Carbon Comparison">
    <figcaption>Gemini 4 Neon bridges ultra-fast Hydrogen execution and heavy Carbon research with 4 configurable thinking levels, a 1M unified context window, and a 95% implicit cache read discount.</figcaption>
</figure>

<p>Because Neon inherits Gemini 4 Carbon’s core training lineage and representation space while pruning redundant verification loops, developers get near-Carbon analytical accuracy without waiting through multi-minute deliberation on every terminal command or file edit.</p>

<h2 id="architecture-specs">Core Architecture: 1M Unified Long Decode &amp; Four Thinking Levels</h2>

<p>Under the hood, <code>gemini-4-neon</code> is a native multimodal reasoning model accepting text, source code, high-resolution images, audio, video, spreadsheets, and large PDF documents within a single unified memory space. Four architectural pillars stand out for production builders:</p>

<ol>
    <li><strong>1,048,576-Token Unified Context Window:</strong> Input prompts, retrieved repository files, internal thinking tokens, and generated outputs share a seamless 1M-token window.</li>
    <li><strong>65K Synchronous Output &amp; 1M Long Decode:</strong> Standard synchronous API calls return up to <strong>65,536 tokens</strong> in a single response, while background <strong>Long Decode</strong> continuation scales output generation all the way up to the full <strong>1,048,576-token</strong> ceiling—enabling complete multi-module code migrations or exhaustive compliance reports without truncation.</li>
    <li><strong>Four Configurable Thinking Levels (<code>low</code>, <code>medium</code>, <code>high</code>, <code>xhigh</code>):</strong> Unlike rigid reasoning models that burn maximum thinking tokens on trivial subtasks, Neon exposes four granular effort levels. Set <code>high</code> (default) for day-to-day agentic coding, drop to <code>low</code> or <code>medium</code> for rapid tool routing, or dial up to <code>xhigh</code> to hit a <strong>61 score on the Artificial Analysis Intelligence Index</strong> for complex mathematical or architectural proofs.</li>
    <li><strong>Automatic Implicit Context Caching (95% Discount):</strong> Gemini 4 Neon features zero-configuration implicit caching across repeated prompt prefixes—slashing cached input reads from $3.00 down to just <strong>$0.15 per million tokens</strong> (explicit manual cache management is unnecessary and omitted in favor of automatic prefix caching).</li>
</ol>

<blockquote>
    “The breakthrough with Gemini 4 Neon isn’t just raw benchmark IQ—it’s steerability per dollar. In multi-turn coding loops where an agent reads 200,000 cached repository tokens twenty times in a row, Neon’s $0.15 implicit cache reads and leaner thinking turns cut end-to-end task bills by 32% to 50%.”
</blockquote>

<h2 id="agentic-multiplier">The Agentic Harness Multiplier: Why Neon Dominates Real-World Coding</h2>

<p>One of the most revealing technical findings in Google DeepMind’s November 2026 release notes comes from <strong>SWE-sweep</strong>, an evaluation suite measuring autonomous bug fixing and multi-file surgical refactoring across complex software repositories:</p>

<ul>
    <li>When evaluated inside a generic, stripped-down <strong>Mini-SWE baseline harness</strong>, Gemini 4 Neon scores <strong>12.8%</strong>—ahead of GPT-6.2 Sol (11.6%) and Claude Opus 5.5 (3.6%).</li>
    <li>When deployed inside its native <strong>Google Antigravity agentic harness</strong>—with structured file-tree inspection, parallel tool execution, and mid-task verification—Neon’s SWE-sweep accuracy surges over <strong>3× to 39.0%</strong>, outpacing Claude Opus 5.5 (10.1% on Claude Code) and GPT-6.2 Sol (8.3% on Codex).</li>
</ul>

<p>Inside Google Antigravity, engineering teams are already adopting a dual-model <strong>Orchestrator–Worker pattern</strong>: <code>gemini-4-neon</code> acts as the primary coordinator—planning architecture, resolving cross-file dependencies, and reviewing diffs—while spawning parallel <code>gemini-4-hydrogen</code> subagents to handle high-volume file searches, boilerplate tests, and documentation updates simultaneously.</p>

<h2 id="benchmark-comparison">Benchmarks: Gemini 4 Neon vs. Claude Opus 5.5, Claude Fable 5.2 &amp; GPT-6.2</h2>

<p>Across independent leaderboards published by Artificial Analysis, Vals AI, and Surge AI in November 2026, Gemini 4 Neon claims outright #1 rankings in both autonomous software engineering and enterprise spreadsheet/finance workflows:</p>

<table>
    <thead>
        <tr>
            <th>Category</th>
            <th>Benchmark / Index</th>
            <th>Gemini 4 Neon</th>
            <th>Claude Opus 5.5</th>
            <th>Claude Fable 5.2</th>
            <th>GPT-6.2 (Sol / Astra)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Agentic Coding</strong></td>
            <td><strong>AA Coding Agent Index</strong></td>
            <td><strong>58.6 (#1)</strong></td>
            <td>—</td>
            <td>58.5</td>
            <td>53.5 (Astra)</td>
        </tr>
        <tr>
            <td><strong>Repo Engineering</strong></td>
            <td><strong>SWE-sweep (Native Harness)</strong></td>
            <td><strong>39.0%</strong></td>
            <td>10.1%</td>
            <td>—</td>
            <td>8.3% (Sol)</td>
        </tr>
        <tr>
            <td><strong>IDE Agent</strong></td>
            <td><strong>CursorBench v4.1</strong></td>
            <td><strong>65.4%</strong></td>
            <td>58.1%</td>
            <td>—</td>
            <td>—</td>
        </tr>
        <tr>
            <td><strong>CLI &amp; Shell</strong></td>
            <td><strong>Terminal-Bench 4.1</strong></td>
            <td>65.2%</td>
            <td><strong>65.8%</strong></td>
            <td>—</td>
            <td>61.5% (Sol)</td>
        </tr>
        <tr>
            <td><strong>Enterprise Work</strong></td>
            <td><strong>Surge AI Tuesday@Work</strong></td>
            <td><strong>71.6 (#1)</strong></td>
            <td>—</td>
            <td>71.2</td>
            <td>—</td>
        </tr>
        <tr>
            <td><strong>General Reasoning</strong></td>
            <td><strong>AA Intelligence Index (xhigh)</strong></td>
            <td><strong>61 (#3 Global)</strong></td>
            <td>59</td>
            <td>—</td>
            <td>57 (Sol)</td>
        </tr>
        <tr>
            <td><strong>Enterprise Suite</strong></td>
            <td><strong>Vals Index v2.2</strong></td>
            <td><strong>70.9%</strong></td>
            <td>70.1%</td>
            <td>—</td>
            <td>66.1% (Sol)</td>
        </tr>
        <tr>
            <td><strong>Math &amp; Science</strong></td>
            <td><strong>RiemannBench</strong></td>
            <td><strong>84.0%</strong></td>
            <td>80.0%</td>
            <td>—</td>
            <td>80.0% (Sol)</td>
        </tr>
        <tr>
            <td><strong>Workflow Automation</strong></td>
            <td><strong>AutomationBench</strong></td>
            <td><strong>56.3%</strong></td>
            <td>42.5%</td>
            <td>—</td>
            <td>41.3% (Sol)</td>
        </tr>
    </tbody>
</table>

<p>Equally notable for enterprise adoption is Neon’s showing on <strong>Surge AI’s Tuesday@Work Index (71.6)</strong> and the <strong>Agent Arena Index (#2 overall at 1336 Elo)</strong>. Reviewers highlighted two operational strengths: markedly lower hallucination/fabrication rates when auditing dense financial workbooks (<code>.xlsx</code> valuation models) and superior mid-task steerability when a human engineer interrupts an agent to change requirements halfway through a build.</p>

<h2 id="api-pricing">Gemini 4 Neon API Pricing &amp; Inference Tiers</h2>

<p>Gemini 4 Neon requires a paid billing account on Google AI Studio or Google Cloud Vertex AI (there is no free API tier for <code>gemini-4-neon</code>). Google offers three distinct inference tiers tailored to latency and throughput needs:</p>

<table>
    <thead>
        <tr>
            <th>Inference Tier</th>
            <th>Input (per 1M Tokens)</th>
            <th>Implicit Cache Read (per 1M)</th>
            <th>Output + Thinking (per 1M)</th>
            <th>Ideal Production Workload</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Standard Tier</strong></td>
            <td><strong>$3.00</strong></td>
            <td><strong>$0.15</strong> (95% off)</td>
            <td><strong>$15.00</strong></td>
            <td>Interactive IDE coding agents, chat apps, live enterprise copilots</td>
        </tr>
        <tr>
            <td><strong>Batch / Flex Tier</strong></td>
            <td><strong>$1.50</strong></td>
            <td><strong>$0.075</strong> (95% off)</td>
            <td><strong>$7.50</strong></td>
            <td>Overnight codebase migrations, bulk document extraction, eval pipelines</td>
        </tr>
        <tr>
            <td><strong>Priority Tier</strong></td>
            <td><strong>$5.40</strong></td>
            <td><strong>$0.27</strong> (95% off)</td>
            <td><strong>$27.00</strong></td>
            <td>Mission-critical SLA production traffic &amp; peak-hour low-latency agents</td>
        </tr>
    </tbody>
</table>

<p>For individual developers and enterprise teams on consumer/workspace plans, Gemini 4 Neon is also rolled out inside the <strong>Gemini web and mobile app</strong> (powering Deeper Analysis workflows for <strong>Google AI Pro</strong> and <strong>Google AI Ultra</strong> subscribers) as well as third-party developer environments including <strong>Cursor</strong>, <strong>GitHub Copilot</strong>, and <strong>OpenRouter</strong> (<code>google/gemini-4-neon</code>).</p>

<h2 id="verdict-when-to-use">Bottom Line: When Should Teams Choose Gemini 4 Neon?</h2>

<ul>
    <li><strong>Choose Gemini 4 Neon (<code>gemini-4-neon</code>) as your default frontier workhorse</strong> for autonomous coding agents, multi-file debugging, terminal automation, SQL/data engineering, and complex spreadsheet or legal synthesis where fast turnaround and predictable token bills matter.</li>
    <li><strong>Pair Neon with Gemini 4 Hydrogen</strong> in multi-agent pipelines so Neon handles architectural planning at <code>high</code> thinking while Hydrogen executes lightweight parallel lookups in milliseconds.</li>
    <li><strong>Reserve Gemini 4 Carbon</strong> for the top 5% of ultra-deep research bottlenecks—such as formal cryptographic verification, novel scientific theorem proving, or zero-day security audits—where exhaustive multi-minute reasoning outweighs latency and cost.</li>
</ul>

<p>By delivering Carbon-grade architectural intelligence at a $3/$15 price point backed by 95% implicit cache savings, <strong>Gemini 4 Neon</strong> cements Google DeepMind’s strongest position yet in the 2026 agentic software engineering race.</p>
HTML;
    }
}
