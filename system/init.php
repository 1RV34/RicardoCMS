<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @todo Continue init script.
 * @version 0.1.0
 */

define('_RC_START_TIME_', microtime(true));
ini_set('default_charset', 'utf-8');
ini_set('magic_quotes_runtime', 0);

if (!headers_sent())
	header('Content-Type: text/html; charset=utf-8');

require_once dirname(__FILE__).'/config/config.inc.php';

echo 'Hello World!';
