<?php

return [
    'connections' => [
        'default' => [
            'auto_connect' => false,
            'connection' => Adldap\Connections\Ldap::class,
            'schema' => Adldap\Schemas\OpenLDAP::class,
            'connection_settings' => [
                // 'account_prefix' => env('ADLDAP_ACCOUNT_PREFIX', ''),
                // 'account_suffix' => env('ADLDAP_ACCOUNT_SUFFIX', ''),
                // 'domain_controllers' => explode(' ', env('ADLDAP_CONTROLLERS', 'jpsandiego@caritas.com.ph')),
                // 'port' => env('ADLDAP_PORT', 389),
                // 'timeout' => env('ADLDAP_TIMEOUT', 5),
                // 'base_dn' => env('ADLDAP_BASEDN', 'dc=caritas,dc=com,dc=ph'),
                // 'admin_account_prefix' => env('ADLDAP_ADMIN_ACCOUNT_PREFIX', ''),
                // 'admin_account_suffix' => env('ADLDAP_ADMIN_ACCOUNT_SUFFIX', ''),
                // 'admin_username' => env('ADLDAP_ADMIN_USERNAME', 'jpsandiego'),
                // 'admin_password' => env('ADLDAP_ADMIN_PASSWORD', 'Pitikbulag22'),
                // 'follow_referrals' => false,
                // 'use_ssl' => env('ADLDAP_USE_SSL', false),
                // 'use_tls' => env('ADLDAP_USE_TLS', false),
            ],
        ],
    ],
];
