<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
   'tt_content',
   'CType',
    [
        'LLL:EXT:tx_ma_phpinclude/Resources/Private/Language/locallang_db.xlf:extension.title',
        'tx_ma_phpinclude',
        'ma-php-include-icon',
    ],
    'textmedia',
    'after'
);

 $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['txmaphpinclude_content'] = 'ma-php-include-icon';

 $pluginSignature = 'txmaphpinclude_content';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,recursive,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:tx_ma_phpinclude/Configuration/Flexforms/flexform.xml');

$GLOBALS['TCA']['tt_content']['types']['tx_ma_phpinclude'] = [
    'showitem' => '
     --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general,
    --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.header;header,bodytext,
    --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.appearance,
    --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.frames;frames,
    --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.table_layout;tablelayout,
    --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,
    --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.visibility;visibility,
    --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.access;access,
    --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.extended
    ',
    'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'renderType' => 'input',
                'format' => 'input',
            ],
        ],
    ],
];