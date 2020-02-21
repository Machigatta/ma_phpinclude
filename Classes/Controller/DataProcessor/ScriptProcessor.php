<?php
namespace Machigatta\MaPHPInclude\Controller\DataProcessor;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use Machigatta\MaPHPInclude\Domain\Model\ExtensionConfiguration;


class ScriptProcessor implements DataProcessorInterface
{
    private $__cObj;
    private $__contentObjectConfiguration;
    private $__processorConfiguration;
    private $__processedData;
    private $__PATH;
    private $__extensionConfiguration;

    protected $_targetVariableName;
    protected $_fieldName;

    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
    {

        if (isset($processorConfiguration['if.']) && !$cObj->checkIf($processorConfiguration['if.'])) {
            return $processedData;
        }

        $this->__extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);

        $this->__cObj = $cObj;
        $this->__contentObjectConfiguration = $contentObjectConfiguration;
        $this->__processorConfiguration = $processorConfiguration;
        $this->__processedData = $processedData;
        $this->__resolveFlexIntoArray();
        if($this->__processedData[$this->_targetVariableName]['override_mode']){
            //Override with Path
            $this->__PATH = $this->__extensionConfiguration->getOverridePath() . $this->__processedData[$this->_targetVariableName]['override_mode_url'];
        }else{
            //Default way
            $this->__PATH = PATH_site ."/uploads/tx_maphpinclude/" . $this->__processedData[$this->_targetVariableName]['script_file'];

        }
        $this->__processedData['data']['parsedScript'] = $this->resolveString($this->__PATH);
        return $this->__processedData;
    }

    private function __resolveFlexIntoArray()
    {
        $this->_targetVariableName = $this->__cObj->stdWrapValue('as', $this->__processorConfiguration, 'flexform');
        $this->_fieldName = $this->__cObj->stdWrapValue('fieldName', $this->__processorConfiguration, 'pi_flexform');
        $flexformService = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Service\\FlexFormService');
        $this->__processedData[$this->_targetVariableName] = $flexformService->convertFlexFormContentToArray($this->__cObj->data[$this->_fieldName]);
    }

    public function resolveString($link)
    {
        if (trim($link) == '') {
            return false;
        }

        ob_start();
        $content = "<div class='ma_phpinclude'>";
        $GLOBALS["TSFE"]->set_no_cache();
        include $link;
        $content .= ob_get_contents();
        $content .= "</div>";

        ob_end_clean();

        return $content;
    }
}
