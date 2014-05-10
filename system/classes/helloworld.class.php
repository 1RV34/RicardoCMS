<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

class HelloWorld
{
	public function __construct()
	{
		$css = new CSS;
		$css->add('system/lib/normalize.css');
		$css->add('system/global.css');
		$javaScript = new JavaScript;
		$javaScript->add('system/lib/jquery.min.js');
		$javaScript->add('system/ricardocms.js');
		$smarty = new Smarty_RicardoCMS;
		$title = array('RicardoCMS', 'Hello World!');
		$vars = array(
			'title' => implode(' - ', array_reverse($title)),
			'javaScriptData' => json_encode(array('title' => $title)),
			'cssJs' => trim($css->getOut().$javaScript->getOut()),
			'pageName' => 'Hello World!',
		);
		$smarty->assign($vars);
		$smarty->display('header.tpl');
		p('Debugging is enabled.');
		$smarty->display('content/hello-world.tpl');
		$smarty->display('footer.tpl');
	}
}
