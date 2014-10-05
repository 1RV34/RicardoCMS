<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

require_once dirname(__FILE__).'/finder.php';

class Autoload_RicardoCMS
{
	private static $_instance;
	private $default;
	private $directories;

	public static function getInstance()
	{
		if (!self::$_instance)
		{
			$configFile = Finder::getInstance()->find('config', 'autoload.php');

			if (!$configFile)
				die('Missing autoload config.');

			$config = require $configFile;
			self::$_instance = new self($config->default, $config->directories);
		}

		return self::$_instance;
	}

	public function __construct($default, $directories)
	{
		$this->default = $default;
		$this->directories = $directories;
	}

	public function load($className)
	{
		$dir = 'classes';
		$file = implode('/', array_reverse(explode('_', strtolower($className)))).'.php';

		if (substr($file, 0, 11) == 'ricardocms/')
			$file = substr($file, 11);

		if (substr($file, 0, 10) == 'interface/')
		{
			if (interface_exists($className, false))
				return;

			$dir = 'interfaces';
			$file = substr($file, 10);
		}
		else
		{
			if (class_exists($className, false))
				return;
		}

		if ($fileName = Finder::getInstance()->find($dir, $file))
			require_once $fileName;
	}
}
