<?php

	namespace OpenTHC\Bunk\Metrc\Plants;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"PlantLabel" => "ABCDEF012345670000000011",
			"PackageTag" => "ABCDEF012345670000010011",
			"PlantBatchType" => "Clone",
			"Item" => "Blue Dream Clones",
			"Location" => null,
			"Note" => null,
			"IsTradeSample" => false,
			"PatientLicenseNumber" => null,
			"IsDonation" => false,
			"Count" => 25,
			"ActualDate"=> "2020-01-15T12:25:43Z"
		  ],
		  [
			"PlantLabel" => "ABCDEF012345670000000012",
			"PackageTag" => "ABCDEF012345670000010013",
			"PlantBatchType" => "Seed",
			"Item" => "Blue Dream Seeds",
			"Location" => "Package Room 1",
			"Note" => null,
			"IsTradeSample" => false,
			"PatientLicenseNumber" => null,
			"IsDonation" => false,
			"Count" => 25,
			"ActualDate" => "2020-01-15T12:36:32Z"
		  ]
	);

	return $RES->withJSON($ret);