<?php
/**
 * BioTrack v2013 API Group Controller
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Module;

class BioTrack extends \OpenTHC\Module\Base
{
	/**
	 * @param \OpenTHC\App $a Slim Application
	 */
	function __invoke(\OpenTHC\App $a)
	{

		// Documentation
		$a->get('', function($REQ, $RES, $ARG) {
			return _page_doc_merge('biotrack-v2013');
		});

		// Ping
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
