<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @todo Expand defines.
 * @version 0.1.0
 */

/* Local */
define('_RC_ROOT_DIR_', realpath(dirname(__FILE__).'/../..'));
define('_RC_SYSTEM_DIR_', _RC_ROOT_DIR_.'/system');

/* System */
define('_RC_SYSTEM_CLASS_DIR_', _RC_SYSTEM_DIR_.'/classes');
define('_RC_SYSTEM_CONFIG_DIR_', _RC_SYSTEM_DIR_.'/config');
define('_RC_SYSTEM_LIB_DIR_', _RC_SYSTEM_DIR_.'/libs');
define('_RC_SYSTEM_SMARTY_DIR_', _RC_SYSTEM_DIR_.'/smarty');
define('_RC_SYSTEM_VIEW_DIR_', _RC_SYSTEM_DIR_.'/views');

/* Smarty */
define('_RC_SYSTEM_SMARTY_CACHE_DIR_', _RC_SYSTEM_SMARTY_DIR_.'/cache');
define('_RC_SYSTEM_SMARTY_COMPILE_DIR_', _RC_SYSTEM_SMARTY_DIR_.'/templates_c');
define('_RC_SYSTEM_SMARTY_CONFIG_DIR_', _RC_SYSTEM_SMARTY_DIR_.'/configs');
