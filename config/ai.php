<?php

use App\Services\AI\Providers\OpenAIProvider;

return [
    'default' => env('AI_PROVIDER', 'openai'),
    'providers' => [
        'openai' => [
            'driver' => 'openai',
            'class' => OpenAIProvider::class,
            'credential_config' => 'services.openai.api_key',
            'base_url' => env('OPENAI_BASE_URL', 'https://api.openai.com/v1'),
            'model' => env('OPENAI_MODEL', 'gpt-4o-mini'),
        ],
    ],
    'model' => env('AI_MODEL', env('OPENAI_MODEL', 'gpt-4o-mini')),
    'timeout' => (int) env('AI_TIMEOUT', 30),
    'max_tokens' => (int) env('AI_MAX_TOKENS', 500),
    'temperature' => (float) env('AI_TEMPERATURE', 0.2),
    'retries' => (int) env('AI_RETRIES', 2),
    'retry_backoff_ms' => (int) env('AI_RETRY_BACKOFF_MS', 250),
    'fallback_provider' => env('AI_FALLBACK_PROVIDER'),
    'logs_enabled' => (bool) env('AI_LOGS_ENABLED', true),
    'cache' => [
        'store' => env('AI_CACHE_STORE', 'redis'),
        'fallback_store' => env('CACHE_STORE', 'database'),
        'prompt_ttl' => (int) env('AI_PROMPT_CACHE_TTL', 3600),
        'response_ttl' => (int) env('AI_RESPONSE_CACHE_TTL', 300),
        'context_ttl' => (int) env('AI_CONTEXT_CACHE_TTL', 120),
        'summary_ttl' => (int) env('AI_SUMMARY_CACHE_TTL', 600),
    ],
    'context' => [
        'message_limit' => (int) env('AI_CONTEXT_MESSAGE_LIMIT', 12),
        'max_characters' => (int) env('AI_CONTEXT_MAX_CHARACTERS', 12000),
        'history_max_messages' => (int) env('AI_HISTORY_MAX_MESSAGES', 20),
        'history_max_characters' => (int) env('AI_HISTORY_MAX_CHARACTERS', 8000),
        'summary_max_characters' => (int) env('AI_SUMMARY_MAX_CHARACTERS', 900),
    ],
    'queue' => [
        'name' => env('AI_QUEUE_NAME', 'ai'),
        'tries' => (int) env('AI_QUEUE_TRIES', 3),
        'timeout' => (int) env('AI_QUEUE_TIMEOUT', 60),
        'backoff' => array_map('intval', explode(',', env('AI_QUEUE_BACKOFF', '10,30,90'))),
        'unique_for' => (int) env('AI_QUEUE_UNIQUE_FOR', 600),
    ],
    'confidence' => [
        'auto_reply_threshold' => (float) env('AI_AUTO_REPLY_THRESHOLD', 0.85),
        'human_review_threshold' => (float) env('AI_HUMAN_REVIEW_THRESHOLD', 0.60),
        'weights' => [
            'language' => 0.15,
            'intent' => 0.25,
            'context' => 0.15,
            'order' => 0.10,
            'summary' => 0.10,
            'reply' => 0.15,
            'business_rules' => 0.10,
        ],
        'fallback_penalty' => 0.12,
    ],
    'costs' => [
        'gpt-4o-mini' => ['prompt_per_million' => 0.15, 'completion_per_million' => 0.60, 'currency' => 'USD'],
    ],
];
