<?php

	namespace OpenTHC\Bunk\Metrc\Plants;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Plant"=> "ABCDEF012345670000010011",
			"Weight"=> 100.23,
			"UnitOfWeight"=> "Grams",
			"DryingLocation"=> "Harvest Location",
			"HarvestName"=> "2015-12-15-Harvest Location-H",
			"PatientLicenseNumber"=> "X00001",
			"ActualDate"=> "2015-12-15"
		  ],
		  [
			"Plant"=> "ABCDEF012345670000010012",
			"Weight"=> 10.15,
			"UnitOfWeight"=> "Grams",
			"DryingLocation"=> "Harvest Location",
			"HarvestName"=> null,
			"PatientLicenseNumber"=> "X00002",
			"ActualDate"=> "2015-12-15"
		  ]
	);

	return $RES->withJSON($ret);