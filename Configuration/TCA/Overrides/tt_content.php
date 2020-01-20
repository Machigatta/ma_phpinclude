<?php

// \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
//     'Machigatta.MaPHPInclude',
//     'MaPHPInclude',
//     '[Machigatta] PHP Script',
//     'EXT:MaPHPInclude/Resources/Public/Icons/ext_icon.png'
// );

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
       'LLL:EXT:MaPHPInclude/Resources/Private/Language/Tca.xlf:MaPHPIncludeSCRIPT',
       'MaPHPIncludeSCRIPT',
       'ma-php-include-icon'
    ),
    'CType',
    'MaPHPInclude'
 );

 $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['MaPHPIncludeSCRIPT'] = 'ma-php-include-icon';

 $GLOBALS['TCA']['tt_content']['types']['MaPHPIncludeSCRIPT'] = array(
    'showitem' => '
          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.header;header,
       --div--;PHPScript,
				bodytext;LLL:EXT:videoce/Resources/Private/Language/locallang_db.xlf:tx_ma_phpinclude_content_model.item_source_path,
       --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
       --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
          --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
       --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
 ');