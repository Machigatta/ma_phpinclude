<?php

defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Machigatta.tx_ma_phpinclude',
    'PHPScriptList',
    [
    ],
    [
        \Machigatta\MaPHPInclude\Controller\DataProcessor\ScriptProcessor::class => 'process',
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:news/Configuration/PageTS/modWizards.ts">
');

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
 );

 if (TYPO3_MODE === 'BE') {
        $icons = [
            'ma-php-include-icon' => 'ext_icon.png',
        ];
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        foreach ($icons as $identifier => $path) {
            $iconRegistry->registerIcon(
                $identifier,
                \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
                ['source' => 'EXT:tx_ma_phpinclude/Resources/Public/Icons/' . $path]
            );
        }
    }
