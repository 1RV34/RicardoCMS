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
		$smarty = new Smarty_RicardoCMS;
		$smarty->assign('title', 'Hello World! - RicardoCMS');
		$smarty->assign('cssJs', trim($css->getOut().$javaScript->getOut()));
		$smarty->assign('pageName', 'Hello World!');
		$smarty->display('header.tpl');
		p('Debugging is enabled.');
		$smarty->display('content/hello-world.tpl');
		$smarty->display('footer.tpl');
	}
}
