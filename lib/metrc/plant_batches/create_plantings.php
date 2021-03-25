<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Plant_Batches;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Name"=> "B. Kush 5-30",
		"Type"=> "Clone",
		"Count"=> 25,
		"Strain"=> "Spring Hill Kush",
		"Location"=> null,
		"PatientLicenseNumber"=> "X00001",
		"ActualDate"=> "2015-12-15"
	],
	[
		"Name"=> "B. Kush 5-31",
		"Type"=> "Seed",
		"Count"=> 50,
		"Strain"=> "Spring Hill Kush",
		"Location"=> null,
		"PatientLicenseNumber"=> "X00002",
		"ActualDate"=> "2015-12-15"
	]
);

return $RES->withJSON($ret);
