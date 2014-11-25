<?php
/**
 * A class for debugging and a set of functions that function as aliasses.
 *
 * @author Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>
 * @copyright 2014 Ricardo Vermeltfoort
 * @version 0.1.0
 */

if (!function_exists('d'))
{
	/**
	 * An alias of Debug::dieObject($object, $title)
	 *
	 * @uses Debug::dieObject()
	 */
	function d($object, $title = '')
	{
		return Debug::dieObject($object, $title);
	}
}

if (!function_exists('dm'))
{
	/**
	 * An alias of Debug::dieMail($object, $title, $line)
	 *
	 * @uses Debug::dieMail()
	 */
	function dm($object, $title = '', $line = 0)
	{
		return Debug::dieMail($object, $title, $line);
	}
}

if (!function_exists('p'))
{
	/**
	 * An alias of Debug::dieObject($object, $title, false)
	 *
	 * @uses Debug::dieObject()
	 */
	function p($object, $title = '')
	{
		return Debug::dieObject($object, $title, false);
	}
}

if (!function_exists('m'))
{
	/**
	 * An alias of Debug::dieMail($object, $title, $line, false)
	 *
	 * @uses Debug::dieMail()
	 */
	function m($object, $title = '', $line = 0)
	{
		return Debug::dieMail($object, $title, $line, false);
	}
}

/**
 * @todo Add a function to do a var dump.
 */
class Debug
{
	const TAG_NAME = 'pre';
	const CLASS_NAME = 'debug-code';
	const CSS_STYLE = 'background:#272822;color:#f8f8f2;overflow:auto;padding:.5em';
	const MAIL_TO = 'Ricardo Vermeltfoort <ricardovermeltfoort@gmail.com>';
	const MAIL_SUBJECT = 'Debug';
	const MAIL_FROM_USER = 'debug';
	const MAIL_FROM_NAME = 'Debug';
	private static $_enabled = false;
	private static $_printedStyle = false;

	/**
	 * Enable or disable debugging.
	 *
	 * @param bool $enable Whether to enable or disable
	 *
	 * @return void
	 */
	public static function enable($enable = true)
	{
		self::$_enabled = $enable;
	}

	/**
	 * An alias of Debug::enable(false)
	 *
	 * @uses Debug::enable()
	 */
	public static function disable()
	{
		self::enable(false);
	}

	/**
	 * Get debugging status.
	 *
	 * @return bool Whether debugging is enabled or not.
	 */
	public static function isEnabled()
	{
		return self::$_enabled;
	}

	/**
	 * Print out an object to the browser.
	 *
	 * @param mixed $object The object to print out.
	 *
	 * @param string $title A title for the object.
	 *
	 * @param bool $exit Whether to exit after printing out or not.
	 *
	 * @return mixed {@uses $object}
	 */
	public static function dieObject($object, $title = '', $exit = true)
	{
		if (!self::isEnabled())
			return $object;

		echo self::getStyle().self::title($title).self::wrap(print_r($object, true));

		if ($exit)
			exit;

		return $object;
	}

	/**
	 * Send an email with the printout of an object.
	 *
	 * @todo Make styles inline.
	 *
	 * @see Debug::dieObject()
	 *
	 * @param mixed $object The object to print out.
	 *
	 * @param string $title A title for the object.
	 *
	 * @param int $line A line number to find the debug statement back easier (provide __LINE__).
	 *
	 * @param bool $exit Whether to exit after printing out or not.
	 *
	 * @return mixed {@uses $object}
	 */
	public static function dieMail($object, $title = '', $line = 0, $exit = true)
	{
		if (!self::isEnabled())
			return $object;

		$additionalHeaders = array(
			self::MAIL_FROM_NAME.' '.$_SERVER['SERVER_NAME'].' <'.self::MAIL_FROM_USER.'@'.$_SERVER['SERVER_NAME'].'>' => 'From',
			'1.0' => 'MIME-Version',
			'text/html; charset=UTF-8' => 'Content-Type',
		);

		/* Mail */
		$to = self::MAIL_TO;

		if (is_array($to))
			$to = implode(', ', $to);

		$subject = '['.self::MAIL_SUBJECT.'] '.($title ? $title.' - ' : '').$_SERVER['SERVER_NAME'];
		$message = str_replace("\n", "\r\n", self::title(__FILE__.($line ? ':'.$line : '')).self::wrap(print_r($object, true), true));
		$additional_headers = '';

		foreach ($additionalHeaders as $value => $name)
			$additional_headers .= $name.': '.$value."\r\n";

		mail($to, $subject, $message, $additional_headers);

		if ($exit)
			exit;

		return $object;
	}

	private static function getStyle()
	{
		if (self::$_printedStyle)
			return;

		self::$_printedStyle = true;
		return '<style type="text/css">'.self::TAG_NAME.'.'.self::CLASS_NAME.'{'.self::CSS_STYLE.'}</style>'."\n";
	}

	private static function title($title)
	{
		if (!$title)
			return;

		return '<p>'.htmlentities($title, false, 'UTF-8').'</p>';
	}

	private static function wrap($output, $inlineStyles = false)
	{
		return self::openWrap($inlineStyles).htmlentities($output, false, 'UTF-8').self::closeWrap();
	}

	private static function openWrap($inlineStyles = false)
	{
		return '<'.self::TAG_NAME.' '.($inlineStyles ? 'style="'.self::CSS_STYLE.'"' : 'class="'.self::CLASS_NAME.'"').'>';
	}

	private static function closeWrap()
	{
		return '</'.self::TAG_NAME.'>'."\n";
	}
}
