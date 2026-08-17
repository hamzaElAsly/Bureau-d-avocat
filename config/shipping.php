<?php

use App\Services\Shipping\Providers\CathedisProvider;
use App\Services\Shipping\Providers\SenditProvider;

return [
    'default_providers' => [
        [
            'code' => 'sendit',
            'name' => 'Sendit',
            'service_class' => SenditProvider::class,
            'is_active' => true,
        ],
        [
            'code' => 'cathedis',
            'name' => 'Cathedis',
            'service_class' => CathedisProvider::class,
            'is_active' => true,
        ],
    ],

    'default_integrations' => [
        [
            'name' => 'Sendit',
            'slug' => 'sendit',
            'provider_type' => 'sendit',
            'auth_type' => 'bearer',
            'base_url' => null,
            'settings' => [
                'timeout' => 30,
                'retries' => 1,
                'endpoints' => [],
            ],
            'is_active' => true,
            'is_default' => true,
        ],
        [
            'name' => 'Cathedis',
            'slug' => 'cathedis',
            'provider_type' => 'cathedis',
            'auth_type' => 'cookie',
            'base_url' => env('CATHEDIS_BASE_URL', 'https://v1.cathedis.delivery'),
            'settings' => [
                'timeout' => 30,
                'retries' => 1,
                'session_ttl_hours' => 8,
                'delivery_type' => 'Livraison CRBT',
                'range_weight' => null,
                'default_weight' => 1,
                'default_width' => 10,
                'default_length' => 10,
                'default_height' => 10,
                'fragile' => false,
                'endpoints' => [
                    'login' => '/login.jsp',
                    'test' => '/ws/public/c2c/city?deliveryAvailability=true',
                    'create_delivery' => '/ws/action',
                    'get_delivery' => '/ws/rest/com.tracker.delivery.db.Delivery/{external_id}/fetch',
                    'list_deliveries' => '/ws/action',
                    'logs' => '/ws/action',
                    'generate_label' => '/ws/action',
                    'pickup' => '/ws/action',
                    'cities' => '/ws/public/c2c/city?deliveryAvailability=true',
                ],
            ],
            'is_active' => false,
            'is_default' => false,
        ],
    ],
];
