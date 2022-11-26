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
        'client_id' => '874927845773-72ho5esisn522jlgn6ddi3kcrjkb2fed.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://baecay.petprotectusa.com/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '281506560540781',
        'client_secret' => '3605e867420aa6c5f642a2e2c4705297',
        'redirect' => 'http://localhost/datingproject/auth/facebook/callback',
    ],
    'recaptcha' => [
    'key' => '6Lfn80ocAAAAAKp4FzKmsne0b2s0b5VMdrI3bcaL',
    'secret' => '6Lfn80ocAAAAABOaVarJnYlkPKFHrrw0gdLwzLbi',
    ],
];
