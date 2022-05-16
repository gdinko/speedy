<?php

/*
 * You can place your custom package configuration in here.
 */
return [

    /**
     * Set Speedy API username
     */
    'user' => env('SPEEDY_API_USER', 'iasp-dev'),

    /**
     * Set Speedy API password
     */
    'pass' => env('SPEEDY_API_PASS', 'iasp-dev'),

    /**
     * Default Speedy API Base Url
     */
    'base-url' => rtrim(env('SPEEDY_API_BASE_URL', 'https://api.speedy.bg/v1/'), '/'),

    /**
     * Set Request timeout
     */
    'timeout' => env('SPEEDY_API_TIMEOUT', 5),
];
