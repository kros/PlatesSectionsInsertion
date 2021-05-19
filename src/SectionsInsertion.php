<?php
namespace Kros\PlatesExtension;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

class SectionsInsertion implements ExtensionInterface{
	public $template;
	protected $engine;
	public function register(Engine $engine)
	{
		$this->engine = $engine;
		
		$this->engine->registerFunction('setSectionContent', [$this, 'setSectionContent']);

	}
	public function setSectionContent($sectionName, $templateName, $params=[]){
		$this->template->start($sectionName); 
		$this->template->insert($templateName, $params); 
		$this->template->stop();
	}
}