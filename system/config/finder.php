<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

$finderConfig = new stdClass;
$finderConfig->dirs = array(
	_RC_SYSTEM_DIR_,
	_RC_APPLICATION_DIR_,
);
$finderConfig->defaultExt = 'php';
$finderConfig->exts = array(
	'views' => 'tpl',
	'css' => 'css',
	'js' => 'js',
);
return $finderConfig;
