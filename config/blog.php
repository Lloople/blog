<?php

return [
    'domain' => env('BLOG_DOMAIN', ''),

    'theme' => [
        'color' => env('BLOG_THEME_COLOR', 'grey-lightest'),
        'color_main' => env('BLOG_THEME_COLOR_MAIN', 'white'),
        'color_highlight' => env('BLOG_THEME_COLOR_HIGHLIGHT', 'black'),
        'color_highlight_text' => env('BLOG_THEME_COLOR_HIGHLIGHT_TEXT', 'white'),
    ],

    'twitter_username' => env('BLOG_TWITTER_USER', ''),
];
