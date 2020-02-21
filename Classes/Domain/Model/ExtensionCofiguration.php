<?php

namespace Machigatta\MaPHPInclude\Domain\Model;

use TYPO3\CMS\Core\SingletonInterface;

class ExtensionConfiguration implements SingletonInterface
{
    protected $_configurationArray = array();
    protected $_overridePath = '';

    public function __construct()
    {
        $this->configurationArray = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['ma_phpinclude']);
        if (is_array($this->configurationArray)) {
            foreach ($this->configurationArray as $key => $value) {
                $methodName = 'set' . ucfirst($key);
                if (method_exists($this, $methodName)) {
                    $this->$methodName($value);
                }
            }
        }
    }

    public function toArray()
    {
        return $this->configurationArray;
    }


    public function getOverridePath()
    {
        return $this->_overridePath;
    }

    public function setOverridePath($overridePath)
    {
        $this->_overridePath = (string)$overridePath;
    }
}
