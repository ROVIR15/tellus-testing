<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Constants\FAQConstants;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Seed default FAQ items from constants into the faqs table.
     */
    public function run(): void
    {
        $items = FAQConstants::getItems();

        foreach ($items as $index => $item) {
            Faq::updateOrCreate(
                ['label' => $item['label']],
                [
                    'description' => $item['description'],
                    'category' => null,
                    'is_published' => true,
                    'order' => $index + 1,
                ]
            );
        }
    }
}