<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    /**
     * Display testimonies section page.
     */
    public function index()
    {
        $testimonies = Testimony::query()
            ->where('is_published', true)
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->get()
            ->map(function (Testimony $t) {
                return [
                    'name' => $t->name,
                    'role' => $t->role,
                    'company' => $t->company,
                    'location' => $t->location,
                    'avatar' => $t->avatar_path ? asset('storage/' . $t->avatar_path) : null,
                    'quote' => $t->quote,
                    'source' => $t->source,
                ];
            })
            ->toArray();

        return view('testimonies', [
            'testimonies' => $testimonies,
        ]);
    }

    /**
     * Return published testimonies as JSON.
     */
    public function json()
    {
        $testimonies = Testimony::query()
            ->where('is_published', true)
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->get()
            ->map(function (Testimony $t) {
                return [
                    'name' => $t->name,
                    'role' => $t->role,
                    'company' => $t->company,
                    'location' => $t->location,
                    'avatar' => $t->avatar_path ? asset('storage/' . $t->avatar_path) : null,
                    'quote' => $t->quote,
                    'source' => $t->source,
                ];
            })
            ->toArray();

        return response()->json([
            'data' => $testimonies,
        ]);
    }
}