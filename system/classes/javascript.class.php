<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

class JavaScript extends CCCResource
{
	public function getType()
	{
		return 'javascript';
	}

	public function getBase()
	{
		return _JS_DIR_;
	}

	public function getDir()
	{
		return _RC_JS_DIR_;
	}

	public function getExt()
	{
		return 'js';
	}
}
