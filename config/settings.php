<?php

return [
    'company_name' => 'Sklepik',
    'company_owner' => 'Artur Miłkowski',
    'company_address' => [
        'street' => 'Łukasiewicza 4',
        'city' => 'Oświęcim',
        'zip_code' => '32-600',
        'voivodeship' => 'małopolskie',
        'phone' => '+48 33 123 45 67',
    ],
    'currency' => 'zł',
    'delivery' => [
        'polish_post_office' => [
            'name' => 'Poczta Polska',
            'methods' => [
                'registered_letter' => 'List polecony',
                'parcel' => 'Paczka',
            ],
            'cost' => [
                '1' => 15,
                '2' => 15,
                '3' => 15,
                '4' => 15,
                '5' => 20,
                'more' => 45
            ],
        ],
        'methods_of_payment' => ['prepayment' => 'Przedpłata na konto']
    ],
    'account_number' => '12345678901234567890',
];
