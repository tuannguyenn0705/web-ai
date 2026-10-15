<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Danh sách bài viết
     */
    public function index(Request $request)
    {
        $query = Post::published()->with(['category', 'author', 'tags']);

        // Lọc theo loại bài viết
        if ($request->has('type')) {
            $query->ofType($request->type);
        }

        // Tìm kiếm
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->latest('published_at')->paginate(15);

        return view('posts.index', compact('posts'));
    }

    /**
     * Chi tiết bài viết
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)
            ->published()
            ->with(['category', 'author', 'tags', 'comments' => function ($query) {
                $query->approved()->whereNull('parent_id')->with('replies')->latest();
            }])
            ->firstOrFail();

        // Tăng lượt xem
        $post->incrementViews();

        // Bài viết liên quan
        $relatedPosts = Post::published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->with(['category', 'author'])
            ->latest('published_at')
            ->take(4)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
