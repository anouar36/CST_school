<?php

return [
    'database' => [
        'host' => 'mysql', // اسم الحاوية MySQL من Docker Compose
        'dbname' => 'CST_School', // اسم قاعدة البيانات في Docker Compose
        'user' => 'user', // المستخدم المحدد في Docker Compose
        'password' => 'anwar36flow', // كلمة المرور المحددة في Docker Compose
    ],
    'google' => [
        'web' => [
            'client_id' => '75833613650-dcq73ob8l1v2vu4n0vrtcr7vsuttifjf.apps.googleusercontent.com',
            'client_secret' => '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',
            'redirect_uris' => ['http://localhost:82/student'],
            'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
            'token_uri' => 'https://oauth2.googleapis.com/token',
            'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
        ]
    ]
];

