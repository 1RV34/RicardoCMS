<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

class Finder
{
	private static $_instance;
	private $dirs;
	private $defaultExt;
	private $exts;

	public static function getInstance()
	{
		if (!self::$_instance)
		{
			$dirs = array(
				_RC_SYSTEM_DIR_,
				_RC_APPLICATION_DIR_,
			);
			$finder = new self($dirs, 'php');
			$configFile = $finder->find('config', 'finder');

			if (!$configFile)
				die('Missing finder config.');

			$config = require $configFile;
			self::$_instance = new self($config->dirs, $config->defaultExt, $config->exts);
		}

		return self::$_instance;
	}

	public function __construct($dirs, $defaultExt, $exts = array())
	{
		$this->dirs = $dirs;
		$this->defaultExt = $defaultExt;
		$this->exts = $exts;
	}

	public function find($dir, $file)
	{
		$ext = $this->defaultExt;

		if (array_key_exists($dir, $this->exts))
			$ext = $this->exts[$dir];

		$path = $dir.'/'.$file.'.'.$ext;

		foreach (array_reverse($this->dirs) as $searchDir)
		{
			$searchPath = $searchDir.'/'.$path;

			if (file_exists($searchPath))
				return $searchPath;
		}

		return false;
	}
}
