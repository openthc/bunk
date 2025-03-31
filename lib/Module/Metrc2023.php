<?php
/**
 * METRC Group
 *
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Module;

class Metrc2023 extends \OpenTHC\Module\Base
{
	/**
	 * @param \OpenTHC\App $a Slim Application
	 */
	function __invoke(\OpenTHC\App $a)
	{
		$a->get('', function($REQ, $RES, $ARG) {
			return _page_doc_merge('Metrc2023');
		});

	}

}
