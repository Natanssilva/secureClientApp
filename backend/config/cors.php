<?php

return [
    // api
    'paths' => ['/*'], // Define quais rotas devem ter CORS aplicado

    'allowed_methods' => ['*'], // Permite todos os métodos (GET, POST, etc)

    'allowed_origins' => ['*'], // Permite todas as origens (troque para URLs específicas se necessário)

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Permite todos os headers

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false, // Altere para true se precisar suportar cookies ou autenticação baseada em sessões
];
