<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Trang chủ - hiển thị bài viết mới nhất
     */
    public function index()
    {
        $featuredPosts = Post::published()
            ->featured()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->take(5)
            ->get();

        $latestPosts = Post::published()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->take(9)
            ->get();

        $categories = Category::active()
            ->root()
            ->withCount(['posts' => function ($query) {
                $query->published();
            }])
            ->orderBy('order')
            ->get();

        return view('home', compact('featuredPosts', 'latestPosts', 'categories'));
    }
}
