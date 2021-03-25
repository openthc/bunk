<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Packages;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Label"=> "ABCDEF012345670000010041",
		"Item"=> "Shake"
	],
	[
		"Label"=> "ABCDEF012345670000010042",
		"Item"=> "Shake"
	]
);

return $RES->withJSON($ret);
