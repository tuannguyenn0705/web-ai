<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Post;
use Illuminate\View\View;

class SpotlightController extends Controller
{
    /**
     * Display the dedicated iApply review & ads landing page.
     */
    public function iapply(): View
    {
        return $this->renderSpotlight('iapply');
    }

    /**
     * Display the dedicated ANARA review & ads landing page.
     */
    public function anara(): View
    {
        return $this->renderSpotlight('anara');
    }

    /**
     * Display the dedicated Typeless review & ads landing page.
     */
    public function typeless(): View
    {
        return $this->renderSpotlight('typeless');
    }

    /**
     * Render a hardcoded AI spotlight review page with its bespoke theme and shared sidebar context.
     */
    protected function renderSpotlight(string $key): View
    {
        $spotlights = config('spotlights.items', []);
        abort_unless(isset($spotlights[$key]), 404);

        $spotlight = $spotlights[$key];
        $otherSpotlights = collect($spotlights)->except($key)->values()->all();

        $sidebarDeals = Deal::active()
            ->orderByDesc('is_featured')
            ->orderBy('order')
            ->latest()
            ->take(2)
            ->get();

        $trendingPosts = Post::published()
            ->with('category')
            ->orderByDesc('views_count')
            ->take(3)
            ->get();

        return view('spotlights.'.$key, compact(
            'spotlight',
            'otherSpotlights',
            'sidebarDeals',
            'trendingPosts'
        ));
    }
}
