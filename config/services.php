<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '791964865165-igtdiiqorlbio9as9j5vjc1ljaft48ss.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8282/google/callback',
    ],

    'facebook' => [
        'client_id' => '596060988971484',
        'client_secret' => '1aff76b4289843348000f674f416b2be',
        'redirect' => 'http://localhost:8282/facebook/callback',
    ],
];
