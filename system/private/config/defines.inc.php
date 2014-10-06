<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @todo Expand defines.
 * @version 0.1.0
 */

/* Web */
define('_CSS_DIR_', __RC_BASE_URI__.'css/');
define('_JS_DIR_', __RC_BASE_URI__.'js/');

/* Local */
define('_RC_ROOT_DIR_', realpath(dirname(__FILE__).'/../../..'));
define('_RC_CSS_DIR_', _RC_ROOT_DIR_.'/css');
define('_RC_JS_DIR_', _RC_ROOT_DIR_.'/js');
define('_RC_SYSTEM_DIR_', _RC_ROOT_DIR_.'/system');

/* - System */
define('_RC_SYSTEM_PRIVATE_DIR_', _RC_SYSTEM_DIR_.'/private');

/* - - Private */
define('_RC_SYSTEM_PRIVATE_LIB_DIR_', _RC_SYSTEM_PRIVATE_DIR_.'/libs');
define('_RC_SYSTEM_PRIVATE_SMARTY_DIR_', _RC_SYSTEM_PRIVATE_DIR_.'/smarty');
define('_RC_SYSTEM_PRIVATE_VIEW_DIR_', _RC_SYSTEM_PRIVATE_DIR_.'/views');

/* - - - Smarty */
define('_RC_SYSTEM_PRIVATE_SMARTY_CACHE_DIR_', _RC_SYSTEM_PRIVATE_SMARTY_DIR_.'/cache');
define('_RC_SYSTEM_PRIVATE_SMARTY_COMPILE_DIR_', _RC_SYSTEM_PRIVATE_SMARTY_DIR_.'/templates_c');
define('_RC_SYSTEM_PRIVATE_SMARTY_CONFIG_DIR_', _RC_SYSTEM_PRIVATE_SMARTY_DIR_.'/configs');
