<?php
/**
 * OpenTHC Bunk API Application Bootstrap
 *
 * SPDX-License-Identifier: MIT
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

/**
 * Rewrites $_SERVER['REQUEST_URI']
 * The Input would be a servername
 */
function _url_host_helper_rewrite() : void
{
	$path = $_SERVER['REQUEST_URI'];
	$path = strtok($path, '?');
	$path = trim($path, '/');
	$path0 = strtok($path, '/');
	$path1 = strtok('');
	switch ($path0) {
		case 'api-ak.metrc.com':
		case 'api-ca.metrc.com':
		case 'api-co.metrc.com':
		case 'api-ma.metrc.com':
		case 'api-md.metrc.com':
		case 'api-me.metrc.com':
		case 'api-mi.metrc.com':
		case 'api-mt.metrc.com':
		case 'api-nv.metrc.com':
		case 'api-ok.metrc.com':
		case 'api-or.metrc.com':
		// case 'sandbox-api-ca.metrc.com':
		// case 'sandbox-api-co.metrc.com':
		// case 'sandbox-api-or.metrc.com':
		// case 'sandbox-api-md.metrc.com':
			$_SERVER['REQUEST_URI'] = sprintf('/metrc/v2015/%s?=%s', $path1, http_build_query($_GET));
			break;
		case 'cannabispr.biotrackthc.net':
		case 'hicsts.hawaii.gov':
		case 'mcmonitoring.agr.illinois.gov':
		case 'mcp-tracking.nmhealth.org':
		case 'mminventory.health.nd.gov':
			// BioTrack
			$_SERVER['REQUEST_URI'] = sprintf('/biotrack/v2013/serverjson.asp?%s', http_build_query($_GET));
			break;
		case 'cannabisreporting.lcb.wa.gov':
			// CCRS
			$_SERVER['REQUEST_URI'] = sprintf('/ccrs/v2021?%s', http_build_query($_GET));
	}

}
