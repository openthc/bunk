<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Packages;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Label"=> "ABCDEF012345670000010041",
		"ActualDate"=> "2015-12-15"
	],
	[
		"Label"=> "ABCDEF012345670000010042",
		"ActualDate"=> "2015-12-15"
	]
);

return $RES->withJSON($ret);
