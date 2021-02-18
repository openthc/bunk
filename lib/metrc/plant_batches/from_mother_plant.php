<?php

	namespace OpenTHC\Bunk\Metrc\Plant_Batches;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id"=> null,
			"PlantBatch"=> "Demo Plant Batch 1",
			"Count"=> 10,
			"Location"=> null,
			"Item"=> "Immature Plants",
			"Tag"=> "ABCDEF012345670000020201",
			"PatientLicenseNumber"=> "P00001",
			"Note"=> "This is a note.",
			"IsTradeSample"=> false,
			"IsDonation"=> false,
			"ActualDate"=> "2015-12-15"
		  ],
		  [
			"Id"=> 5,
			"PlantBatch"=> null,
			"Count"=> 10,
			"Location"=> null,
			"Item"=> "Immature Plants",
			"Tag"=> "ABCDEF012345670000020202",
			"PatientLicenseNumber"=> "P00002",
			"Note"=> "",
			"IsTradeSample"=> true,
			"IsDonation"=> false,
			"ActualDate"=> "2015-12-15"
		  ]
	);

	return $RES->withJSON($ret);