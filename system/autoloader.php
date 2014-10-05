<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @todo Cache paths.
 * @version 0.1.0
 */

require_once dirname(__FILE__).'/classes/autoload.php';
require_once dirname(__FILE__).'/classes/finder.php';
spl_autoload_register(array(Autoload_RicardoCMS::getInstance(), 'load'));
