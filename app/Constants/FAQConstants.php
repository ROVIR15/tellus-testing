<?php

namespace App\Constants;

class FAQConstants
{
    /**
     * FAQ items array with id, label, and description
     */
    public static function getItems(): array
    {
        return [
            [
                'id' => 'faq-1',
                'label' => 'How do I request a lab test?',
                'description' => 'To request a lab test, navigate to our testing inquiry form and select the test type you need. Provide your project details, location, and timeline. Our team will contact you within 24 hours to confirm scheduling and pricing.',
            ],
            [
                'id' => 'faq-2',
                'label' => 'What testing methods do you use?',
                'description' => 'We employ ASTM International Standards and AASHTO Testing Protocols for all our testing services. Our methods are ISO 17025 accredited, ensuring accuracy and reliability across soil, water, and geosynthetic testing.',
            ],
            [
                'id' => 'faq-3',
                'label' => 'How long does testing take?',
                'description' => 'Standard testing turnaround is 5-10 business days depending on test complexity. We offer expedited services for urgent projects with results available within 24-48 hours. Contact us to discuss your timeline.',
            ],
            [
                'id' => 'faq-4',
                'label' => 'What is PVD analysis?',
                'description' => 'PVD (Prefabricated Vertical Drains) analysis is a specialized geotechnical testing service used to optimize soil consolidation in ground improvement projects. We provide comprehensive analysis and recommendations for drainage system placement.',
            ],
            [
                'id' => 'faq-5',
                'label' => 'Do you provide on-site testing?',
                'description' => 'Yes, we offer on-site testing services for soil classification, compaction verification, and preliminary assessments. Our mobile lab can visit your project location for immediate analysis and reporting.',
            ],
            [
                'id' => 'faq-6',
                'label' => 'How do I access my test results?',
                'description' => 'Test results are provided via secure portal access and email delivery. You can view detailed reports, charts, and recommendations anytime. We also provide hard copies upon request.',
            ],
        ];
    }

    /**
     * Get a single FAQ item by ID
     */
    public static function getItemById(string $id): ?array
    {
        foreach (self::getItems() as $item) {
            if ($item['id'] === $id) {
                return $item;
            }
        }
        return null;
    }
}
