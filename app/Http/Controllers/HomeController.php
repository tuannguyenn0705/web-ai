<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

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
            ->paginate(12);

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
