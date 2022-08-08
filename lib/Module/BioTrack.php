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

		// Info
		$a->get('/ping', function($REQ, $RES, $ARG) {
			return $RES->withJSON([
				'data' => [
					'cre' => 'openthc/bunk/biotrack',
				],
				'meta' => []
			]);
		});

		// This one is sloppy cause I just slapped in some existing crap I had
		$a->post('/serverjson.asp', function($REQ, $RES, $ARG) {
			return require_once(APP_ROOT . '/lib/biotrack/main.php');
		});

	}

}
