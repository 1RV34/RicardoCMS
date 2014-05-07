<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

$autoloaderConfig = new stdClass;
$autoloaderConfig->default = 'class';
$autoloaderConfig->directories = array(
	'class' => _RC_SYSTEM_CLASS_DIR_,
	'interface' => _RC_SYSTEM_INTERFACE_DIR_,
);
return $autoloaderConfig;
