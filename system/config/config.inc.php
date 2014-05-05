<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @todo Continue config script.
 * @version 0.1.0
 */

$settingsFileName = dirname(__FILE__).'/settings.inc.php';

if (!file_exists($settingsFileName))
{
	if (file_exists(dirname(__FILE__).'/../../install'))
		header('Location: install/');
	elseif (file_exists(dirname(__FILE__).'/../../install-dev'))
		header('Location: install-dev/');
	else
		echo 'No settings file or install directory found.';

	exit;
}
