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

    'textlocal' => [
        'key' => env('TEXT_LOCAL_KEY', ''),
        'sender' => env('TEXT_LOCAL_SENDER', ''),
        'test' => env('TEXT_LOCAL_TEST', true),
        'test_numbers' => explode(',', env('TEXT_LOCAL_TEST_NUMBERS', '')),
    ],

    'users' => [1, 4, 5, 9, 106, 4240, 102, 3779],
];