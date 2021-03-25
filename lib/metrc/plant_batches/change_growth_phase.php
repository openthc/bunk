<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Plant_Batches;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Name" => "AK-47 Clone 1/31/2017",
		"Count" => 25,
		"StartingTag" => "ABCDEF012345670000020401",
		"GrowthPhase" => "Flowering",
		"NewLocation" => "Plants Location",
		"GrowthDate" => "2015-12-15",
		"PatientLicenseNumber" => "X00001"
	],
	[
		"Name" => "AK-47 Clone 1/31/2017",
		"Count" => 25,
		"StartingTag" => "ABCDEF012345670000020427",
		"GrowthPhase" => "Vegetative",
		"NewLocation" => "Harvest Location",
		"GrowthDate" => "2015-12-15",
		"PatientLicenseNumber" => "X00002"
	]
);

return $RES->withJSON($ret);
