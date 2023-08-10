<?php

return [
    'disable' => env('CAPTCHA_DISABLE', false),
    'characters' => ['0', '1', '2', '3', '4', '6', '7', '8', '9'],
    'default' => [
        'length' => 6,
        'width' => 160,
        'height' => 45,
        'quality' => 90,
        'math' => false,
        'expire' => 60,
        'encrypt' => false,
        'bgImage' => false,
        'lines' => false,
    ],
];
