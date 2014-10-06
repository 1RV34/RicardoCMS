<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

require_once _RC_SYSTEM_PRIVATE_LIB_DIR_.'/smarty/Smarty.class.php';

class Smarty_RicardoCMS extends Smarty
{
	public function __construct()
	{
		$configFile = Finder::getInstance()->find('private/config', 'smarty');

		if (!$configFile)
			die('Error: "smarty" config file is missing.');

		$config = require $configFile;
		parent::__construct();
		$this->setCacheDir($config->cacheDir);
		$this->setCompileDir($config->compileDir);
		$this->setConfigDir($config->configDir);
		$this->setTemplateDir($config->templateDir);
		$this->assign('_baseUri', __RC_BASE_URI__);
		$this->assign('_websiteName', 'RicardoCMS');
	}
}
