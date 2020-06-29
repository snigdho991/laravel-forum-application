<?php

use App\User;

return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => '510855739593306',
            'client_secret' => 'f69ca97ebe9e0c2604fccae66fdc64ba',
            'redirect_uri' => 'http://forumapps.test/facebook/redirect',
            'scope' => [],
        ],
        'google' => [
            'client_id' => '663463099192-rm4luu66odqd4k274euhqk9arhqv0kt6.apps.googleusercontent.com',
            'client_secret' => 'g-0oBrgsNvxkpGIMcRksK1LE',
            'redirect_uri' => 'http://forumapps.test/google/redirect',
            'scope' => [],
        ],
        'github' => [
            'client_id' => '949a4ebae6eef057bad3',
            'client_secret' => '6966161c678e24f4f26bf964d478bb322b529b93',
            'redirect_uri' => 'http://forumapps.test/github/redirect',
            'scope' => [],
        ],
        'linkedin' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/linkedin/redirect',
            'scope' => [],
        ],
        'instagram' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/instagram/redirect',
            'scope' => [],
        ],
        'soundcloud' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/soundcloud/redirect',
            'scope' => [],
        ],
    ],
];
