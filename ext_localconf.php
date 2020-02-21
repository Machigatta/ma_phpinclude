<?php

defined('TYPO3_MODE') || die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Machigatta.ma_phpinclude',
    'PHPScriptList',
    [
    ],
    [
        \Machigatta\MaPHPInclude\Controller\DataProcessor\ScriptProcessor::class => 'process',
    ]
);

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
            ['source' => 'EXT:ma_phpinclude/Resources/Public/Icons/' . $path]
        );
    }

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
	mod.wizards.newContentElement.wizardItems.special {
		elements.ma_phpinclude {
			iconIdentifier = ma-php-include-icon
			title = LLL:EXT:ma_phpinclude/Resources/Private/Language/Tca.xlf:extension.title
			description = LLL:EXT:ma_phpinclude/Resources/Private/Language/Tca.xlf:extension.description
			tt_content_defValues {
				CType = ma_phpinclude
			}
		}
		show :=addToList(ma_phpinclude)
	}
	');
}


