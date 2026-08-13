<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have a
    | conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'sendit' => [
        'base_url' => env('SENDIT_BASE_URL', 'https://app.sendit.ma/api/v1'),
        'api_token' => env('SENDIT_API_TOKEN'),
        'webhook_token' => env('SENDIT_WEBHOOK_TOKEN'),
    ],

    'cathedis' => [
        'base_url' => env('CATHEDIS_BASE_URL', 'https://v1.cathedis.delivery'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    ],

    'whatsapp' => [
        'token' => env('WHATSAPP_TOKEN'),
        'phone_number_id' => env('WHATSAPP_PHONE_NUMBER_ID'),
        'business_account_id' => env('WHATSAPP_BUSINESS_ACCOUNT_ID'),
        'verify_token' => env('WHATSAPP_VERIFY_TOKEN'),
        'app_secret' => env('WHATSAPP_APP_SECRET'),
        'graph_version' => env('WHATSAPP_GRAPH_VERSION', 'v19.0'),
        'webhook_url' => env('WHATSAPP_WEBHOOK_URL', env('APP_URL').'/webhooks/whatsapp'),
    ],

    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
    ],

];
