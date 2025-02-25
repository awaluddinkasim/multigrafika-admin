<?php

return [
    [
        'active' => 'dashboard',
        'label' => 'Dashboard',
        'icon' => 'dashboard',
        'route' => 'dashboard',
    ],
    [
        'active' => 'stickers',
        'label' => 'Stickers',
        'icon' => 'receipt',
        'submenu' => [
            [
                'label' => 'List',
                'route' => 'stickers.list',
            ],
            [
                'label' => 'Create',
                'route' => 'stickers.create',
            ],
        ],
    ],
    [
        'active' => 'orders',
        'label' => 'Orders',
        'icon' => 'list',
        'route' => 'orders',
    ],
    [
        'active' => 'account',
        'label' => 'Account',
        'icon' => 'person',
        'submenu' => [
            [
                'label' => 'Admin',
                'route' => 'account.admin',
            ],
            [
                'label' => 'Customer',
                'route' => 'account.user',
            ],
        ]
    ],
    [
        'active' => 'about',
        'label' => 'About',
        'icon' => 'info',
        'route' => 'about',
    ]
];
