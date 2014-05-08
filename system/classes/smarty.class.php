<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

require_once _RC_SYSTEM_LIB_DIR_.'/smarty/Smarty.class.php';

class Smarty_RicardoCMS extends Smarty
{
	public function __construct()
	{
		$config = require _RC_SYSTEM_CONFIG_DIR_.'/smarty.php';
		parent::__construct();
		$this->setCacheDir($config->cacheDir);
		$this->setCompileDir($config->compileDir);
		$this->setConfigDir($config->configDir);
		$this->setTemplateDir($config->templateDir);
		$this->assign('_website_name', 'RicardoCMS');
	}
}
