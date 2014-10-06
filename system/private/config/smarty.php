<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

$smartyConfig = new stdClass;
$smartyConfig->cacheDir = _RC_SYSTEM_PRIVATE_SMARTY_CACHE_DIR_;
$smartyConfig->compileDir = _RC_SYSTEM_PRIVATE_SMARTY_COMPILE_DIR_;
$smartyConfig->configDir = _RC_SYSTEM_PRIVATE_SMARTY_CONFIG_DIR_;
$smartyConfig->templateDir = _RC_SYSTEM_PRIVATE_VIEW_DIR_;
return $smartyConfig;
