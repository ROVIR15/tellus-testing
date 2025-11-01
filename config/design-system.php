<?php

/**
 * Design System Configuration
 * 
 * This file contains the centralized color and typography configuration
 * that is used across both Filament and custom components.
 */

return [
    'colors' => [
        // Primary Colors
        'primary' => [
            100 => '#add8ff',
            200 => '#1f93ff',
            300 => '#0066ac',
            400 => '#004a8f',
            500 => '#002d56',
            10 => '#3041e1',
        ],
        // Secondary Colors
        'secondary' => [
            100 => '#fbccf6',
            200 => '#f298e6',
            300 => '#a60e52',
            400 => '#840811',
            500 => '#39050c',
            10 => '#ae6552',
        ],
        // Neutral Colors
        'neutral' => [
            100 => '#ffffff',
            200 => '#f5f5f5',
            300 => '#d2d2d2',
            400 => '#b8b8b8',
            500 => '#949494',
            600 => '#6b6b6c',
            700 => '#777777',
            800 => '#606060',
            900 => '#34343a',
            950 => '#1a1a1a',
            1000 => '#111111',
            10 => '#233333',
        ],
        // Feedback Colors
        'feedback' => [
            'success' => '#2ea44f',
            'warning' => '#fdb81e',
            'error' => '#da3633',
            'info' => '#0969da',
        ],
    ],
    'typography' => [
        'fonts' => [
            'body' => "'Lato', ui-sans-serif, system-ui, sans-serif",
            'display' => "'Manrope', ui-sans-serif, system-ui, sans-serif",
        ],
    ],
];
