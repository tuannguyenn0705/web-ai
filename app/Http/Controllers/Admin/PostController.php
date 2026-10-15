<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['category', 'author']);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $posts = $query->latest()->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::active()->orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:news,review,tutorial,update',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|image|max:2048',
            'is_featured' => 'boolean',
            'tags' => 'nullable|array',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['user_id'] = auth()->id();

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('posts', 'public');
        }

        $post = Post::create($validated);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Bài viết đã được tạo thành công!');
    }

    public function edit(Post $post)
    {
        $categories = Category::active()->orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|in:news,review,tutorial,update',
            'status' => 'required|in:draft,published,archived',
            'featured_image' => 'nullable|image|max:2048',
            'is_featured' => 'boolean',
            'tags' => 'nullable|array',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($validated['status'] === 'published' && !$post->published_at) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('posts', 'public');
        }

        $post->update($validated);

        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.index')
            ->with('success', 'Bài viết đã được cập nhật!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')
            ->with('success', 'Bài viết đã được xóa!');
    }
}
