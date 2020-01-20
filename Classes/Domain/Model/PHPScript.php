<?php

namespace Machigatta\MaPHPInclude\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class PHPScript extends AbstractEntity
{
    protected $name = '';
    protected $description = '';
    protected $source_path = 0;
    protected $scriptContent = '';


    public function __construct(string $name = '', string $description = '', string $source_path = '/uploads/tx_ma_phpinclude/', string $scriptContent = ''): void
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setSourcePath($source_path);
        $this->setScriptContent($scriptContent);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setSourcePath(int $source_path): void
    {
        $this->source_path = $source_path;
    }

    public function getSourcePath(): int
    {
        return $this->source_path;
    }

	public function getParsedScriptContent() {
		ob_start();
		eval( '?' . chr(62) . $this->scriptContent . chr(60) . '?php ' );
		$phpString = PHP_EOL . ob_get_contents() . PHP_EOL;
		ob_end_clean();
		return $phpString;
	}

    public function getCcriptContent() {
    	return $this->getParsedScriptContent();
    }

    public function setScriptContent($scriptContent) {
        $this->scriptContent = $scriptContent;
    }
}
}