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

	$t0 = strtok($text, "\n");
	$insert = sprintf('<title>%s - \1</title>', trim(strtok($text, "\n"), '#'));
	$source = preg_replace('/<title>(.+)<\/title>/ms', $insert, $source);

	$pd = new \Parsedown();
	$middle = $pd->text($text);

	$middle = sprintf('<body><div class="cre-note">%s</div></body>', $pd->text($text));

	$output = preg_replace('/<body>.+<\/body>/ms', $middle, $source);

	_exit_html($output);

}
