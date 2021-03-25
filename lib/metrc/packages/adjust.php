<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Packages;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Label"=> "ABCDEF012345670000010041",
		"Quantity"=> -2.0,
		"UnitOfMeasure"=> "Ounces",
		"AdjustmentReason"=> "Drying",
		"AdjustmentDate"=> "2015-12-15",
		"ReasonNote"=> null
	],
	[
		"Label"=> "ABCDEF012345670000010042",
		"Quantity"=> 1.0,
		"UnitOfMeasure"=> "Ounces",
		"AdjustmentReason"=> "Scale Variance",
		"AdjustmentDate"=> "2015-12-15",
		"ReasonNote"=> "We are obtaining a new certified scale"
	]
);

return $RES->withJSON($ret);
