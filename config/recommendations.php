<?php

return [
    'cache_ttl' => (int) env('AI_RECOMMENDATIONS_CACHE_TTL', 600),
    'risk' => [
        'high_cod_amount' => (float) env('AI_RECOMMENDATIONS_HIGH_COD', 500),
        'critical_cod_amount' => (float) env('AI_RECOMMENDATIONS_CRITICAL_COD', 1000),
        'high_threshold' => (int) env('AI_RECOMMENDATIONS_HIGH_RISK', 60),
        'critical_threshold' => (int) env('AI_RECOMMENDATIONS_CRITICAL_RISK', 80),
        'weights' => [
            'duplicate' => 30,
            'cancellation_rate' => 20,
            'return_rate' => 15,
            'failed_deliveries' => 15,
            'cod_amount' => 10,
            'new_customer' => 5,
            'order_state' => 5,
        ],
        'high_risk_cities' => array_values(array_filter(array_map('trim', explode(',', env('AI_RECOMMENDATIONS_HIGH_RISK_CITIES', ''))))),
    ],
    'customer' => [
        'vip_lifetime_value' => (float) env('AI_RECOMMENDATIONS_VIP_LTV', 5000),
        'vip_orders' => (int) env('AI_RECOMMENDATIONS_VIP_ORDERS', 5),
        'high_value_lifetime_value' => (float) env('AI_RECOMMENDATIONS_HIGH_VALUE_LTV', 2500),
        'loyal_orders' => (int) env('AI_RECOMMENDATIONS_LOYAL_ORDERS', 5),
        'inactive_days' => (int) env('AI_RECOMMENDATIONS_INACTIVE_DAYS', 90),
        'high_failure_rate' => (float) env('AI_RECOMMENDATIONS_HIGH_FAILURE_RATE', 0.30),
    ],
    'follow_up' => [
        'pending_hours' => (int) env('AI_RECOMMENDATIONS_PENDING_HOURS', 24),
        'unanswered_hours' => (int) env('AI_RECOMMENDATIONS_UNANSWERED_HOURS', 12),
        'confirmed_unshipped_hours' => (int) env('AI_RECOMMENDATIONS_CONFIRMED_HOURS', 48),
        'shipped_delay_days' => (int) env('AI_RECOMMENDATIONS_SHIPPED_DAYS', 5),
        'delivered_satisfaction_hours' => (int) env('AI_RECOMMENDATIONS_DELIVERED_HOURS', 6),
    ],
    'cross_sell' => [
        'limit' => (int) env('AI_RECOMMENDATIONS_CROSS_SELL_LIMIT', 3),
        'candidate_limit' => (int) env('AI_RECOMMENDATIONS_CANDIDATE_LIMIT', 50),
    ],
];
