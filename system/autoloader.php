<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @todo Cache paths.
 * @version 0.1.0
 */

spl_autoload_register('rcAutoloader');

function rcAutoloader($className)
{
	if (class_exists($className, false))
		return;

	$config = require _RC_SYSTEM_CONFIG_DIR_.'/autoloader.php';

	if (($pos = strpos($className, '_')) !== false)
	{
		$type =      strtolower(substr($className, $pos + 1));

		if ($type == 'interface') // Special
		{
			if (interface_exists($className, false))
				return;
		}

		$className = substr($className, 0, $pos);

		if (array_key_exists($type, $config->directories))
		{
			if (!is_array($config->directories[$type]))
				$config->directories[$type] = array($config->directories[$type]);

			foreach ($config->directories[$type] as $directory)
			{
				$fileName = $directory.'/'.strtolower($className).'.php';

				if (file_exists($fileName))
				{
					require_once $fileName;
					return;
				}
			}
		}
	}

	if (!is_array($config->directories[$config->default]))
		$config->directories[$config->default] = array($config->directories[$config->default]);

	foreach ($config->directories[$config->default] as $directory)
	{
		$fileName = $directory.'/'.strtolower($className).'.php';

		if (file_exists($fileName))
		{
			require_once $fileName;
			return;
		}
	}
}
