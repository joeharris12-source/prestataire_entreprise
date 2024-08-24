<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'prestataire' => [
            'driver' => 'session',
            'provider' => 'prestataires',
        ],

        'entrprestataires' => [
            'driver' => 'session',
            'provider' => 'entrprestataires',
        ],

        'entreprise' => [
            'driver' => 'session',
            'provider' => 'entreprises',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'prestataires' => [
            'driver' => 'eloquent',
            'model' => App\Models\Prestataire::class,
        ],

        'entrprestataires' => [
            'driver' => 'eloquent',
            'model' => App\Models\Entrprestataires::class, // Assurez-vous que le modèle existe
        ],

        'entreprises' => [
            'driver' => 'eloquent',
            'model' => App\Models\Entreprise::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
