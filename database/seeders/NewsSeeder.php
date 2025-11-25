<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $popularCategories = ['Industry News', 'Research', 'Technology'];
        $otherCategories = ['Projects', 'Standards'];
        $tagPool = ['soil', 'geosynthetics', 'water', 'testing', 'lab', 'construction', 'ISO17025', 'ASTM', 'AASHTO'];

        $makeArticle = function (string $groupLabel, Carbon $start, Carbon $end, int $count) use ($faker, $popularCategories, $otherCategories, $tagPool) {
            for ($i = 1; $i <= $count; $i++) {
                $title = $groupLabel . ' ' . $faker->unique()->sentence(4);

                $category = (mt_rand(1, 100) <= 70)
                    ? $popularCategories[array_rand($popularCategories)]
                    : $otherCategories[array_rand($otherCategories)];

                $numTags = mt_rand(2, 4);
                $chosen = collect($tagPool)->shuffle()->take($numTags)->values()->all();
                if (mt_rand(1, 100) <= 50) {
                    $chosen[] = 'testing';
                }
                $tags = implode(',', array_unique($chosen));

                $publishedAt = Carbon::createFromTimestamp(mt_rand($start->timestamp, $end->timestamp));

                News::create([
                    'title' => $title,
                    'slug' => Str::slug($title) . '-' . Str::random(5),
                    'excerpt' => $faker->text(140),
                    'category' => $category,
                    'tags' => $tags,
                    'content' => $faker->paragraphs(mt_rand(3, 7), true),
                    'image_path' => null,
                    'published_at' => $publishedAt,
                    'is_published' => true,
                ]);
            }
        };

        $monthStart = now()->subMonth()->startOfMonth();
        $monthEnd = now()->subMonth()->endOfMonth();
        $weekStart = now()->startOfWeek();
        $weekEnd = now();
        $todayStart = now()->startOfDay();
        $todayEnd = now();

        $makeArticle('Past Month', $monthStart, $monthEnd, 10);
        $makeArticle('This Week', $weekStart, $weekEnd, 10);
        $makeArticle('Today', $todayStart, $todayEnd, 5);
    }
}