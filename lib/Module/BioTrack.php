<?php
/**
 * BioTrack API Group Controller
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Module;

class BioTrack extends \OpenTHC\Module\Base
{
	/**
	 * @param $a Slim Application
	 */
	function __invoke($a)
	{

		// Info
		$a->get('', function($REQ, $RES, $ARG) {
			return _page_doc_merge('biotrack');
		});

		// This one is sloppy cause I just slapped in some existing crap I had
		$a->post('/v2013/serverjson.asp', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/biotrack/main.php');
		});

	}

}
