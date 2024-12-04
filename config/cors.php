<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],

    'allowed_origins' => [
        'https://imigrantelegal.com.br',  // Substitua com suas origens confiáveis
    ],

    'allowed_origins_patterns' => [
        'https://*.imigrantelegal.com.br',  // Permite subdomínios
    ],

    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization'],

    'exposed_headers' => [],

    'max_age' => 3600,  // 1 hora

    'supports_credentials' => true,  // Defina como 'true' apenas se for necessário
];
