<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Trang Dashboard Admin
     */
    public function index()
    {
        $stats = [
            'total_posts' => Post::count(),
            'published_posts' => Post::where('status', 'published')->count(),
            'draft_posts' => Post::where('status', 'draft')->count(),
            'total_categories' => Category::count(),
            'total_comments' => Comment::count(),
            'pending_comments' => Comment::where('is_approved', false)->count(),
            'total_users' => User::count(),
        ];

        $recentPosts = Post::with(['category', 'author'])
            ->latest()
            ->take(5)
            ->get();

        $recentComments = Comment::with(['post', 'user'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentComments'));
    }
}
