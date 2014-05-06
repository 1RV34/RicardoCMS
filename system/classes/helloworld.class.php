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
		$smarty = new Smarty_RicardoCMS;
		p('Debugging is enabled.');
		$smarty->display('content/hello-world.tpl');
	}
}
