<?php
/**
 * OpenTHC Bunk API Application Bootstrap
 */

define('APP_ROOT', __DIR__);

error_reporting(E_ALL & ~ E_NOTICE);

openlog('openthc-bunk', LOG_ODELAY|LOG_PID, LOG_LOCAL0);

require_once(APP_ROOT . '/vendor/autoload.php');

/**
 * Shit Hack for a "theme"
 */
function _page_doc_merge($f)
{
	$source = file_get_contents(APP_ROOT . '/webroot/index.html');

	$file = sprintf('%s/webroot/%s.md', APP_ROOT, $f);
	$text = file_get_contents($file);
	$page_title = strtok($text, "\n");

	$pd = new \Parsedown();
	$middle = $pd->text($text);

	$output = preg_replace('|</nav>.+<footer|ms', "</nav>\n\n<div class=\"container\">{$middle}</div>\n\n<footer", $source);

	_exit_html($output);

}
