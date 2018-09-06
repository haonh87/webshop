<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '319609398785470',
        'client_secret' => '561a01a5516f9d65be268158c20c1887',
        'redirect' => 'http://localhost/webshop/public/auth/facebook/callback',
    ],
    'google' => [
        'client_id'     => '40670416537-2hqse1vg82kppqc3auor6i1pd5k9r3q7.apps.googleusercontent.com',
        'client_secret' => '6yRt20GSN74W6xSgkDx_9cJI',
        'redirect'      => 'http://localhost/webshop/public/auth/google/callback'
    ],
];
