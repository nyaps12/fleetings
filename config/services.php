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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    // 'google' => [
    //     'client_id' => '371669384771-hgsl1m21bpg31l7i1dg7n5ekn354qgv0.apps.googleusercontent.com',
    //     'client_secret' => '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',
    //     'redirect' => 'https://fleet-g43.bbox-express.com/auth/google/callback',
    // ],
    'google' => [
        'client_id' => '371669384771-6rc1c1p6idmtu4b23hoppj49sdffsglg.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/auth/google/callback',
    ],

];
