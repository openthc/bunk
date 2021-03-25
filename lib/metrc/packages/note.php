<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Packages;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"PackageLabel"=> "ABCDEF012345670000010041",
		"Note"=> "Package note here."
		],
		[
		"PackageLabel"=> "ABCDEF012345670000010042",
		"Note"=> ""
		]
);

return $RES->withJSON($ret);
