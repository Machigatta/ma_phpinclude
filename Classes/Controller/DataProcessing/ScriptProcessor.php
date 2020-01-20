<?php
namespace Vendor\MaPHPInclude\DataProcessing;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Class for data processing for the content element "My new content element"
 */
class ScriptProcessor implements DataProcessorInterface
{

    /**
     * Process data for the content element "My new content element"
     *
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
      //  Are they accesable in the 
      $getVars = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET();
		$postVars = \TYPO3\CMS\Core\Utility\GeneralUtility::_POST();

       $resolvedContent = $this->resolveStrings($cObj->data['bodytext']);
       if($resolvedContent){
         $processedData['foo'] = $resolvedContent;
       }else{
         $processedData['foo'] = "MaPHPInclude Error";
       }
        

        return $processedData;
    }

    public function resolveStrings($links)
    {
        if (trim($links) == '') {
            return false;
        }
        $scriptLinkArray = explode("\n", trim($links));
        $retString = '';
        foreach ($scriptLinkArray as $scriptLink) {
            ob_start();
            include($scriptLink);
            $content = ob_get_contents();
            ob_end_clean();
            $retString .= $phpString;
        }

        return $retString;
    }
}
