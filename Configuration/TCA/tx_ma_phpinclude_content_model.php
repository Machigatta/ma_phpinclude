<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:tx_ma_phpinclude/Resources/Private/Language/locallang_db.xlf:tx_ma_phpinclude_content_model',
        'label' => 'name',
        'iconfile' => 'EXT:tx_ma_phpinclude/Resources/Public/Icons/ext_icon.png',
    ],
    'columns' => [
        'name' => [
            'label' => 'LLL:EXT:tx_ma_phpinclude/Resources/Private/Language/locallang_db.xlf:tx_ma_phpinclude_content_model.item_label',
            'config' => [
                'type' => 'input',
                'size' => '20',
                'eval' => 'trim',
            ],
        ],
        'description' => [
            'label' => 'LLL:EXT:tx_ma_phpinclude/Resources/Private/Language/locallang_db.xlf:tx_ma_phpinclude_content_model.item_description',
            'config' => [
                'type' => 'text',
                'eval' => 'trim',
            ],
        ],
        'source_path' => [
            'label' => 'LLL:EXT:tx_ma_phpinclude/Resources/Private/Language/locallang_db.xlf:tx_ma_phpinclude_content_model.item_source_path',
            'config' => [
                'type' => 'input',
                'size' => '200',
                'eval' => 'trim',
            ],
        ],
        'scriptContent' => [
            'exclude' => true,
            'label' => 'LLL:EXT:tx_ma_phpinclude/Resources/Private/Language/locallang_db.xlf:tx_ma_phpinclude_content_model.item_script_content',
            'config' => [
                'type' => 'text',
            	'renderType' => 't3editor',
            	'format' => 'php',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ]
    ],
    'types' => [
        '0' => ['showitem' => 'name, description, source_path'],
    ],
];