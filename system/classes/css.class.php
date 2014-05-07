<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

class CSS extends CCCResource
{
	public function getType()
	{
		return 'css';
	}

	public function getBase()
	{
		return _CSS_DIR_;
	}

	public function getDir()
	{
		return _RC_CSS_DIR_;
	}
}
