<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Packages;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Label"=> "ABCDEF012345670000010041",
		"Location"=> "Back Location",
		"MoveDate"=> "0001-01-01"
	],
	[
		"Label"=> "ABCDEF012345670000010042",
		"Location"=> "Storage Closet",
		"MoveDate"=> "2018-03-15"
	]
);

return $RES->withJSON($ret);
