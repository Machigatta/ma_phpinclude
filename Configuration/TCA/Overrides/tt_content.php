<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:ma_phpinclude/Configuration/Flexforms/flexform.xml',
    'ma_phpinclude'
);

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['ma_phpinclude'] = 'ma-php-include-icon';

$additionalCTypeItem = [
    'LLL:EXT:ma_phpinclude/Resources/Private/Language/Tca.xlf:extension.title',
    'ma_phpinclude',
    'ma-php-include-icon'
];

$existingCTypeItems = $GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'];
$groupFound = false;
$groupPosition = false;
foreach ($existingCTypeItems as $position => $item) {
    if ($item[0] === 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:CType.div.special') {
        $groupFound = true;
        $groupPosition = $position;
        break;
    }
}

if ($groupFound && $groupPosition) {
    // add the new CType item below CType
    array_splice($GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'], $groupPosition, 0, [0 => $additionalCTypeItem]);
} else {
    // nothing found, add two items (group + new CType) at the bottom of the list
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content', 'CType',
        ['LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:CType.div.special', '--div--']
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem('tt_content', 'CType', $additionalCTypeItem);
}

$GLOBALS['TCA']['tt_content']['types']['ma_phpinclude']['showitem'] =
    '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,'
    . '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header,rowDescription,'
    . '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.plugin,pi_flexform,'
    . '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,'
    . '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,'
    . '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,'
    . '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,'
    . '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,'
    . '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.behaviour,'
    . '--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended';