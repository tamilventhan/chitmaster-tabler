<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    | Here you can change the default title of your admin panel.
    |
    */

    'title' => 'chitMaster',
    'title_prefix' => '',
    'title_postfix' => '',
    'bottom_title' => 'chitMaster',
    'current_version' => 'V0.01',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    */

    'logo' => '<b>Tab</b>LAR',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can set up an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    */

    'auth_logo' => [
        'enabled' => true,
        'img' => [
            'path' => 'images/master.png',
            'alt' => 'chit Master',
            'class' => 'navbar-brand-image',
            'width' => 300,
            'height' => 300,
        ],
    ],

    /*
     *
     * Default path is 'resources/views/vendor/tablar' as null. Set your custom path here If you need.
     */

    'views_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look at the layout section here:
    |
    */

    'layout' => 'horizontal',
    //boxed, combo, condensed, fluid, fluid-vertical, horizontal, navbar-overlap, navbar-sticky, rtl, vertical, vertical-right, vertical-transparent

    'layout_light_sidebar' => null,
    'layout_light_topbar' => true,
    'layout_enable_top_header' => false,



        /*
    |--------------------------------------------------------------------------
    | Font Style
    |--------------------------------------------------------------------------
    |
    | apply font style on body section,
    |
    */

    'font_style' => 'Space Grotesk, sans-serif',

    /*
    |--------------------------------------------------------------------------
    | Sticky Navbar for Top Nav
    |--------------------------------------------------------------------------
    |
    | Here you can enable/disable the sticky functionality of Top Navigation Bar.
    |
    | For detailed instructions, you can look at the Top Navigation Bar classes here:
    |
    */

    'sticky_top_nav_bar' => true,

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions, you can look at the admin panel classes here:
    |
    */

    'classes_body' => '',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions, you can look at the urls section here:
    |
    */

    'use_route_url' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password.request',
    'password_email_url' => 'password.email',
    'profile_url' => 'profile.show',
    'setting_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Display Alert
    |--------------------------------------------------------------------------
    |
    | Display Alert Visibility.
    |
    */
    'display_alert' => true,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    |
    */

    'menu' => [
        // Navbar items:
        [
            'text' => 'Dashboard',
            'icon' => 'ti ti-dashboard',
            'url' => 'dashboard',
        ],
        [
            'text' => 'Subscribers',
            'icon' => 'ti ti-users',
            'url' => 'subscribers',
        ],
        [
            'text' => 'Agents',
            'icon' => 'ti ti-user-hexagon',
            'url' => 'agents',
        ],
        [
            'text' => 'Chit Group',
            'icon' => 'ti ti-users-group',
            'url' => 'chit-group',
        ],
        [
            'text' => 'Auctions',
            'icon' => 'ti ti-user-check',
            'url' => 'auctions',
        ],

        [
            'text' => 'Accounts',
            'url' => '#',
            'icon' => 'ti ti-book',
            'active' => ['support2'],
            'submenu' => [
                [
                    'text' => 'Chit Receipts',
                    'url' => 'chit-receipts',
                    'icon' => 'ti ti-receipt-rupee',
                ],
                [
                    'text' => 'Bank Accounts',
                    'url' => 'bank-accounts',
                    'icon' => 'ti ti-building-bank',
                ],
                [
                    'text' => 'Cheque Book',
                    'url' => 'cheque-book',
                    'icon' => 'ti ti-notebook',
                ]
            ],
        ],

        [
            'text' => 'Masters',
            'url' => '#',
            'icon' => 'ti ti-database-star',
            'active' => ['support3'],
            'submenu' => [
                [
                    'text' => 'Companies',
                    'url' => 'companies',
                    'icon' => 'ti ti-building-community',
                ],
                [
                    'text' => 'Branches',
                    'url' => 'branches',
                    'icon' => 'ti ti-map-pins',
                ],
                [
                    'text' => 'Employees',
                    'url' => 'employees',
                    'icon' => 'ti ti-user-star',
                ]
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    |
    */

    'filters' => [
        TakiElias\Tablar\Menu\Filters\GateFilter::class,
        TakiElias\Tablar\Menu\Filters\HrefFilter::class,
        TakiElias\Tablar\Menu\Filters\SearchFilter::class,
        TakiElias\Tablar\Menu\Filters\ActiveFilter::class,
        TakiElias\Tablar\Menu\Filters\ClassesFilter::class,
        TakiElias\Tablar\Menu\Filters\LangFilter::class,
        TakiElias\Tablar\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Vite
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Vite support.
    |
    | For detailed instructions you can look the Vite here:
    | https://laravel-vite.dev
    |
    */

    'vite' => true,
];
