<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DealController extends Controller
{
    /**
     * Danh sách các Deals / Affiliate ưu đãi AI trên trang Client
     */
    public function index(Request $request): View
    {
        $query = Deal::active();

        if ($request->filled('search')) {
            $search = trim((string) $request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $deals = $query->orderBy('order')
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('deals.index', compact('deals'));
    }
}
