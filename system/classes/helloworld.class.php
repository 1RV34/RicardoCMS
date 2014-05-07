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
		$css->printOut();
		$javaScript = new JavaScript;
		$javaScript->add('system/lib/jquery.min.js');
		$javaScript->printOut();
		p('Debugging is enabled.');
		$smarty = new Smarty_RicardoCMS;
		$smarty->display('content/hello-world.tpl');
	}
}
