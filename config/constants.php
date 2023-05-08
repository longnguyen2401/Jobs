<?php

return [
    'USER' => [
        'TYPE' => [
            'DEFAULT' => 0,
            'USER' => 1,
            'COMPANY' => 2,
            'ADMIN' => 3,
        ]   
    ],
    'REQUEST' => [
        'STATUS' => [
            'ADMIN_REVIEW' => 0,
            'ADMIN_ACCEPT' => 1,
            'ADMIN_REJECT' => 3,
            'COMPANY_ACCEPT' => 4,
            'COMPANY_REJECT' => 5,
        ],
        'MESSAGE' => ['JobsCy review', 'JobsCy accept and send to company', 'Jobscy was reject', 'Company accept', 'Company Reject'],
        'CLASS' => ['primary', 'success', 'danger', 'success', 'danger']
    ]
];