<?php
/**
 * OpenTHC Bunk API Application Bootstrap
 *
 * SPDX-License-Identifier: MIT
 */

define('APP_ROOT', __DIR__);

define('APP_VERSION', '420.24.262');

error_reporting(E_ALL & ~ E_NOTICE & ~ E_WARNING);

openlog('openthc-bunk', LOG_ODELAY|LOG_PID, LOG_LOCAL0);

require_once(APP_ROOT . '/vendor/autoload.php');

if ( ! \OpenTHC\Config::init(APP_ROOT) ) {
	_exit_html_fail('<h1>Invalid Application Configuration [OBB-019]</h1>', 500);
}

define('OPENTHC_SERVICE_ID', \OpenTHC\Config::get('openthc/bunk/id'));
define('OPENTHC_SERVICE_ORIGIN', \OpenTHC\Config::get('openthc/bunk/origin'));

require_once('/opt/openthc/cre-adapter/lib/BioTrack.php');
require_once('/opt/openthc/cre-adapter/lib/BioTrack/Contact.php');
require_once('/opt/openthc/cre-adapter/lib/BioTrack/Section.php');
require_once('/opt/openthc/cre-adapter/lib/BioTrack/Vehicle.php');

/**
 * Shit Hack for a "theme"
 */
function _page_doc_merge(string $f) : void
{
	$source = file_get_contents(APP_ROOT . '/webroot/index.html');

	$file = sprintf('%s/doc/%s.md', APP_ROOT, $f);
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
			$_SERVER['REQUEST_URI'] = sprintf('/biotrack/v2014/serverjson.asp?%s', http_build_query($_GET));
			break;
		case 'cannabisreporting.lcb.wa.gov':
			// CCRS
			$_SERVER['REQUEST_URI'] = sprintf('/ccrs/v2021?%s', http_build_query($_GET));
	}

}
