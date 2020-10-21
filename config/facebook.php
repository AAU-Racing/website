<?php

return [
    'config' => [
        'app_id' => env('FACEBOOK_APP_ID', null),
        'app_secret' => env('FACEBOOK_APP_SECRET', null),
        'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION', 'v8.0'),
        'default_access_token' => env('FACEBOOK_APP_ID', null) . '|' . env('FACEBOOK_APP_SECRET', null),
    ],
    'page' => env('FACEBOOK_PAGE', null),
];
