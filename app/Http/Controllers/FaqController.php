<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class FaqController extends Controller
{
    /**
     * Display the FAQ page with items from the database.
     */
    public function index(): View
    {
        $items = Faq::query()
            ->where('is_published', true)
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->get(['id', 'label', 'description'])
            ->map(fn($f) => [
                'id' => 'faq-' . $f->id,
                'label' => $f->label,
                'description' => $f->description,
            ])
            ->toArray();

        return view('faq', [
            'items' => $items,
        ]);
    }

    /**
     * Provide published FAQs as JSON for public consumption.
     */
    public function json(): JsonResponse
    {
        $items = Faq::query()
            ->where('is_published', true)
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->get(['id', 'label', 'description'])
            ->map(fn($f) => [
                'id' => 'faq-' . $f->id,
                'label' => $f->label,
                'description' => $f->description,
            ])
            ->values()
            ->all();

        return response()->json(['items' => $items]);
    }
}