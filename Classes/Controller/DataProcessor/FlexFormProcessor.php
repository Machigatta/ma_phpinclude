<?php
namespace Machigatta\MaPHPInclude\Controller\DataProcessor;
 
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\TypoScriptService;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;


class FlexFormProcessor implements DataProcessorInterface
{
    protected $typoScriptService;

    public function __construct()
    {
        $this->typoScriptService = GeneralUtility::makeInstance(TypoScriptService::class);
    }

    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
        $originalValue = $processedData['data']['pi_flexform'];
        $data = [
            'data' => $originalValue,
            'foo' => 'bar'
        ];
        return $data;
    }
}