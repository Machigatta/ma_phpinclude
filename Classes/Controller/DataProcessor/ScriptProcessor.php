<?php
namespace Machigatta\MaPHPInclude\Controller\DataProcessor;
 
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility;
 
class ScriptProcessor implements DataProcessorInterface
{
   public function process(ContentObjectRenderer $cObj,array $contentObjectConfiguration,array $processorConfiguration,array $processedData) {

      // $cache = GeneralUtility::makeInstance(CacheManager::class)->getCache('myCache');
      // var_dump($cache);
            //$cache->flushByTag('tag_123');
      //$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
       //$processedData['data']['parsedScript'] = $this->resolveStrings('/var/www/html/uploads/tx_lumophpinclude/'.$cObj->data->bodytext);
       $processedData['data']['parsedScript'] = $this->resolveStrings('/var/www/html/uploads/tx_lumophpinclude/'.$cObj->data["bodytext"]);
       return $processedData;
    }


     public function resolveStrings($link)
    {
        if (trim($link) == '') {
            return false;
        }

        ob_start();
        include($link);
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
 