<?php
namespace Kros\PlatesExtension;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

class SectionsInsertion implements ExtensionInterface{
	public $template;
	protected $engine;
	/**
	* @param \League\Plates\Engine $engine
	*/
	public function register(Engine $engine)
	{
		$this->engine = $engine;
		$this->engine->registerFunction('setSectionContent', [$this, 'setSectionContent']);
		$this->engine->registerFunction('pushSectionContent', [$this, 'pushSectionContent']);
		$this->engine->registerFunction('unshiftSectionContent', [$this, 'unshiftSectionContent']);
	}
	
	/**
	* Insert the content of a template into a section.
	*
	* @param $sectionName Name of the section
	* @param $templateName Name of the template
	* @param $params Optional. Array of params to be passed to the template, if needed.
	*/
	public function setSectionContent($sectionName, $templateName, $params=[]){
		$this->template->start($sectionName); 
		$this->template->insert($templateName, $params); 
		$this->template->stop();
	}

	/**
	* Push the content of a template into a section.
	*
	* @param $sectionName Name of the section
	* @param $templateName Name of the template
	* @param $params Optional. Array of params to be passed to the template, if needed.
	*/
	public function pushSectionContent($sectionName, $templateName, $params=[]){
		$this->template->push($sectionName); 
		$this->template->insert($templateName, $params); 
		$this->template->stop();
	}

	/**
	* Unshift the content of a template into a section.
	*
	* @param $sectionName Name of the section
	* @param $templateName Name of the template
	* @param $params Optional. Array of params to be passed to the template, if needed.
	*/
	public function unshiftSectionContent($sectionName, $templateName, $params=[]){
		$this->template->unshift($sectionName); 
		$this->template->insert($templateName, $params); 
		$this->template->stop();
	}	
}
