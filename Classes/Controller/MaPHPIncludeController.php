<?php

namespace Machigatta\MaPHPInclude\Controller;

use Machigatta\MaPHPInclude\Domain\Repository\PHPScriptRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class MaPHPIncludeController extends ActionController
{
    private $PHPScriptRepository;

    /**
     * Inject the product repository
     *
     * @param \Machigatta\MaPHPInclude\Domain\Repository\PHPScriptRepository $PHPScriptRepository
     */
    public function injectPHPScriptRepository(PHPScriptRepository $PHPScriptRepository)
    {
        $this->PHPScriptRepository = $PHPScriptRepository;
    }

    public function listAction()
    {
        $scripts = $this->PHPScriptRepository->findAll();
        $this->view->assign('MaPHPScripts', $script);
    }
}