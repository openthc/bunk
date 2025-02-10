<?php
/**
 * BioTrack v2021 API Group Controller
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Module;

class BioTrack2021 extends \OpenTHC\Module\Base
{
	/**
	 * @param \OpenTHC\App $a Slim Application
	 */
	function __invoke(\OpenTHC\App $a)
	{
		// Documentation
		$a->get('', function($REQ, $RES, $ARG) {
			return _page_doc_merge('biotrack-v2021');
		});

	}

}
