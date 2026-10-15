<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Hiển thị trang tĩnh
     */
    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)
            ->active()
            ->firstOrFail();

        return view('pages.show', compact('page'));
    }
}
