<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

abstract class CCCResource implements CCCResource_Interface
{
	const CCC =       true;
	private $_resources = array();

	protected function getExt()
	{
		return $this->getType();
	}

	protected function minify($data)
	{
		return $data;
	}

	public function add($resources)
	{
		if (!is_array($resources))
			$resources = array($resources);

		foreach ($resources as $resource)
		{
			if (!self::isLocal($resource) ||
				file_exists($this->getDir().'/'.$resource))
				$this->_resources[] = $resource;
			else
				echo '"'.$resource.'" doesn\'t exist<br />
';
		}
	}

	public function getOut()
	{
		if (self::CCC)
			$this->run();

		$output = '';
		$smarty = new Smarty_RicardoCMS;

		foreach ($this->_resources as $resource)
		{
			if (self::isLocal($resource))
				$resource = $this->getBase().$resource.'?'.filemtime($this->getDir().'/'.$resource);

			$smarty->assign('resource', $resource);
			$output .= $smarty->fetch('inc/cccresources/'.$this->getType().'.tpl');
		}

		$this->_resources = array();
		return $output;
	}

	private static function isLocal($resource)
	{
		return strpos($resource, '://') === false && substr($resource, 0, 2) != '//';
	}

	private function run()
	{
		$resources =    array();
		$filesToMerge = array();

		foreach ($this->_resources as $resource)
		{
			if (self::isLocal($resource))
				$filesToMerge[] = $resource;
			else
				$resources[] = $resource;
		}

		if ($filesToMerge)
		{
			$fileName = 'everything-'.md5(implode('|', $filesToMerge)).'.'.$this->getExt();

			if (file_exists($this->getDir().'/'.$fileName) &&
				$this->isUpToDate($fileName))
			{
				$this->_resources = $resources;
				$this->_resources[] = $fileName;
				return;
			}

			$data = '';

			foreach ($filesToMerge as $resource)
				$data .= file_get_contents($this->getDir().'/'.$resource)."\n";

			$data = $this->minify($data);
			file_put_contents($this->getDir().'/'.$fileName, trim($data)."\n");
			$this->_resources = $resources;
			$this->_resources[] = $fileName;
		}
	}

	private function isUpToDate($resource)
	{
		$mTime = filemtime($this->getDir().'/'.$resource);

		foreach ($this->_resources as $resource)
		{
			if (self::isLocal($resource) &&
				filemtime($this->getDir().'/'.$resource) >= $mTime)
				return false;
		}

		return true;
	}
}
