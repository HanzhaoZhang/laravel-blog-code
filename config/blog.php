<?php
return [
    'name' => 'Hanael Blog',
    'title' => 'Hanael Blog',
    'subtitle' => 'http://blog.test',
    'description' => 'Hanael 技术博客',
    'author' => 'Hanael',
    'page_image' => 'banner1.png',
    'posts_per_page' => 5,
    'rss_size' => 25,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage/uploads/',
    ],
    'contact_email' => env('MAIL_FROM'),
];
