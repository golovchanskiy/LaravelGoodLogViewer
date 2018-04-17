<?php

return [

    /**
     * Log files pattern
     */
    'pattern' => '*.log',

    /**
     * Log files storage paths
     */
    'paths' => [
        storage_path('logs'),
    ],

    /**
     * Locale
     *      Supported locales: 'auto', 'ru'
     */
    'locale' => 'auto',

    /**
     * Themes
     *      Supported themes: 'bootstrap-3'
     */
    'theme' => 'bootstrap-3',

    /**
     * Routes
     */
    'routes' => [
        'enabled' => true,
        'prefix' => 'logs',
    ],

    /**
     * Log entries per page
     */
    'per-page' => 30,

];