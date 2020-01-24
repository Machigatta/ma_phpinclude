<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'MaPHPInclude',
    'description' => 'An extension to import PHP-Scripts.',
    'category' => 'plugin',
    'author' => 'Armin Seidling',
    'author_company' => null,
    'author_email' => 'contact@machigatta.com',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '1.0.1',
    'autoload' => [
        'psr-4' => [
            'Machigatta\\MaPHPInclude\\' => 'Classes',
        ]
    ],
    'constraints' => [
        'depends' => [
            'php' => '7.0.0-7.99.99',
            'typo3' => '7.6.0-8.99.99',
        ],
    ],
];