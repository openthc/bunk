<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Plant_Batches;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"PlantBatch"=> "B. Kush 5-30",
		"GroupName"=> "New Plant Batch",
		"Type"=> "Clone",
		"Count"=> 25,
		"Location"=> null,
		"Strain"=> "Spring Hill Kush",
		"PatientLicenseNumber"=> "X00001",
		"ActualDate"=> "2015-12-15T00=>00=>00Z"
	],
	[
		"PlantBatch"=> "B. Kush 5-31",
		"GroupName"=> "New Plant Batch",
		"Type"=> "Seed",
		"Count"=> 50,
		"Location"=> null,
		"Strain"=> "Spring Hill Kush",
		"PatientLicenseNumber"=> null,
		"ActualDate"=> "2015-12-15T00=>00=>00Z"
	]
);

return $RES->withJSON($ret);
