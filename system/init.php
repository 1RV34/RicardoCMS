<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @todo Continue init script.
 * @version 0.1.0
 */

/* Start */
define('_RC_START_TIME_', microtime(true));

/* PHP config */
ini_set('default_charset', 'utf-8');
ini_set('magic_quotes_runtime', 0);
ini_set('upload_max_filesize', '100M');

/* Default content type & charset */
if (!headers_sent())
	header('Content-Type: text/html; charset=utf-8');

/* Copy default sample system config if none is available */
$systemConfigFile = dirname(__FILE__).'/config/system.php';

if (!file_exists($systemConfigFile))
	copy(dirname(__FILE__).'/config/system.sample.php', $systemConfigFile);

/* Load system config */
$config = require $systemConfigFile;

if (!is_array($config->dev))
	$config->dev = array($config->dev);

/* Add localhost to devs */
$config->dev[] = $_SERVER['SERVER_ADDR'];

/* Developer check */
define('_RC_DEV_', in_array($_SERVER['REMOTE_ADDR'], $config->dev));
define('_RC_DEBUG_', _RC_DEV_ && isset($_REQUEST['debug']));
error_reporting(E_ALL);
ini_set('display_errors', _RC_DEBUG_);

/* Load config */
require_once dirname(__FILE__).'/config/config.inc.php';

/* Load autoloader */
require_once _RC_SYSTEM_DIR_.'/autoloader.php';

/* Set debugging */
Debug::enable(_RC_DEBUG_);
