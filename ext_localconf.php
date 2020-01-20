<?php

defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Machigatta.MaPHPInclude',
    'PHPScriptList',
    [
        \Vendor\MaPHPInclude\Controller\MaPHPIncludeController::class => '',
    ],
    // non-cacheable actions
    [
        \Vendor\MaPHPInclude\Controller\MaPHPIncludeController::class => 'list',
    ]
);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
 );
$iconRegistry->registerIcon(
    "ma-php-include-icon",
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:MaPHPInclude/Resources/Public/Icons/ext-icon.png']
 );