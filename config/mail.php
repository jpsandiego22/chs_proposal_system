<?php

// return [
//     'driver' => env('MAIL_DRIVER', 'smtp'),
//     'host' => env('MAIL_HOST', '172.20.0.34'),
//     'port' => env('MAIL_PORT', 25),
//     'from' => [
//         'address' => env('MAIL_FROM_ADDRESS', 'noreply@caritashealthshield.com.ph'),
//         'name' => env('MAIL_FROM_NAME', 'noreply'),
//     ],
//     'encryption' => env('MAIL_ENCRYPTION', 'tls'),
//     'username' => env('MAIL_USERNAME'),
//     'password' => env('MAIL_PASSWORD'),
//     'sendmail' => '/usr/sbin/sendmail -bs',
//     'markdown' => [
//         'theme' => 'default',
//         'paths' => [
//             resource_path('views/vendor/mail'),
//         ],
//     ],

// ];

return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),
    'port' => env('MAIL_PORT', 465),
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'noreply@gmail.com.ph'),
        'name' => env('MAIL_FROM_NAME', 'noreply'),
    ],
    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => [
        'theme' => 'default',
        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
