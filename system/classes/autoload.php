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
			$configFile = Finder::getInstance()->find('config', 'autoloader.php');
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
		if (class_exists($className, false))
			return;

		if (($pos = strpos($className, '_')) !== false)
		{
			$type =      strtolower(substr($className, $pos + 1));

			if ($type == 'interface') // Special
			{
				if (interface_exists($className, false))
					return;
			}

			$className = substr($className, 0, $pos);

			if (array_key_exists($type, $this->directories))
			{
				if (!is_array($this->directories[$type]))
					$this->directories[$type] = array($this->directories[$type]);

				foreach ($this->directories[$type] as $directory)
				{
					if ($fileName = Finder::getInstance()->find($directory, strtolower($className).'.php'))
					{
						require_once $fileName;
						return;
					}
				}
			}
		}

		if (!is_array($this->directories[$this->default]))
			$this->directories[$this->default] = array($this->directories[$this->default]);

		foreach ($this->directories[$this->default] as $directory)
		{
			if ($fileName = Finder::getInstance()->find($directory, strtolower($className).'.php'))
			{
				require_once $fileName;
				return;
			}
		}
	}
}
