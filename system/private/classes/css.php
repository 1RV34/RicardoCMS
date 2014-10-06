<?php
/**
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

require_once _RC_SYSTEM_PRIVATE_LIB_DIR_.'/css_minify/Compressor.php';

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

	public function minify($data)
	{
		return Minify_CSS_Compressor::process($data);
	}
}
