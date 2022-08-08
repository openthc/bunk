<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\METRC\Harvests;

use OpenTHC\Bunk\Module\METRC;

$ret = 	array(
	[
		"Name"=> "Plant Material"
	],
	[
		"Name"=> "Fibrous"
	],
	[
		"Name"=> "Root Ball"
	]
);

return $RES->withJSON($ret);
