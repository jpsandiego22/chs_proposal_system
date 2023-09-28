<?php

return [
    'default' => 'maf',
    'connections' => [
        'maf' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            // 'host' => '172.20.1.13',
            // 'host' => '172.20.0.152',
            'port' => '3306',
            'database' => 'caritash_proposal_2',
            // 'username' => 'devadmin',
            // 'password' => 'd3v4dm1n2k18',
            // 'username' => 'jpsd',
            // 'password' => 'pitikbulag22',
            'username' => 'root',
            'password' => '',
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
            ],
        ],
    'migrations' => 'migrations',
    'redis' => [
        'client' => 'predis',
        'default' => [
            'host' => env('REDIS_HOST', 'localhost'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],
];
