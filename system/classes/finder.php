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

	public static function getInstance()
	{
		if (!self::$_instance)
		{
			$dirs = array(
				_RC_SYSTEM_DIR_,
				_RC_APPLICATION_DIR_,
			);
			self::$_instance = new self($dirs);
		}

		return self::$_instance;
	}

	public function __construct($dirs)
	{
		$this->dirs = $dirs;
	}

	public function find($dir, $file)
	{
		$path = $dir.'/'.$file;

		foreach (array_reverse($this->dirs) as $searchDir)
		{
			$searchPath = $searchDir.'/'.$path;

			if (file_exists($searchPath))
				return $searchPath;
		}

		return false;
	}
}
