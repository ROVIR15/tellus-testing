<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of published news.
     */
    public function index(Request $request)
    {
        $baseQuery = News::query()
            ->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            })
            ->orderByDesc('published_at')
            ->orderByDesc('created_at');

        $news = (clone $baseQuery)->paginate(12);

        $featured = (clone $baseQuery)->first();
        $releaseThisWeek = (clone $baseQuery)
            ->where('published_at', '>=', now()->startOfWeek())
            ->take(6)
            ->get();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('news._items', ['news' => $news])->render(),
                'next_page_url' => $news->nextPageUrl(),
            ]);
        }

        return view('news', [
            'news' => $news,
            'featured' => $featured,
            'releaseThisWeek' => $releaseThisWeek,
        ]);
    }

    /**
     * Display the specified article (by slug).
     */
    public function show(News $news)
    {
        // Only allow published articles; allow null published_at
        $isVisible = $news->is_published && (
            is_null($news->published_at) || $news->published_at->lte(now())
        );
        abort_unless($isVisible, 404);

        // Build related list using category OR tags overlap
        $category = $news->category;
        $tags = $news->tags_array; // helper accessor on model

        $relatedQuery = News::query()
            ->where('is_published', true)
            ->whereKeyNot($news->getKey())
            ->orderByDesc('published_at')
            ->orderByDesc('created_at');

        if ($category || !empty($tags)) {
            $relatedQuery->where(function ($q) use ($category, $tags) {
                if ($category) {
                    $q->orWhere('category', $category);
                }
                if (!empty($tags)) {
                    foreach ($tags as $tag) {
                        $q->orWhere('tags', 'LIKE', '%' . $tag . '%');
                    }
                }
            });
        }

        $related = $relatedQuery->take(4)->get();

        // Fallback to latest if none found
        if ($related->isEmpty()) {
            $related = News::query()
                ->where('is_published', true)
                ->whereKeyNot($news->getKey())
                ->orderByDesc('published_at')
                ->orderByDesc('created_at')
                ->take(4)
                ->get();
        }

        return view('news-detail', [
            'news' => $news,
            'related' => $related,
        ]);
    }
}