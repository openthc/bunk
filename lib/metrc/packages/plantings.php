<?php

	namespace OpenTHC\Bunk\Metrc\Packages;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"PackageLabel"=> "ABCDEF012345670000010041",
			"PackageAdjustmentAmount"=> 2.0,
			"PackageAdjustmentUnitOfMeasureName"=> "Ounces",
			"PlantBatchName"=> "AK-47 Clone 1/31/2017",
			"PlantBatchType"=> "Clone",
			"PlantCount"=> 1,
			"LocationName"=> "Plant Batch Location",
			"StrainName"=> "AK-47",
			"PatientLicenseNumber"=> "X00001",
			"PlantedDate"=> "2017-01-31T00=>00=>00Z",
			"UnpackagedDate"=> "2017-01-31T00=>00=>00Z"
		  ],
		  [
			"PackageLabel"=> "ABCDEF012345670000010042",
			"PackageAdjustmentAmount"=> 4.0,
			"PackageAdjustmentUnitOfMeasureName"=> "Ounces",
			"PlantBatchName"=> "Flo Seed 1/31/2017",
			"PlantBatchType"=> "Seed",
			"PlantCount"=> 2,
			"LocationName"=> null,
			"StrainName"=> "Flo",
			"PatientLicenseNumber"=> "X00002",
			"PlantedDate"=> "2017-01-31T00=>00=>00Z",
			"UnpackagedDate"=> "2017-01-31T00=>00=>00Z"
		  ],
		  [
			"PackageLabel"=> "ABCDEF012345670000010043",
			"PackageAdjustmentAmount"=> null,
			"PackageAdjustmentUnitOfMeasureName"=> null,
			"PlantBatchName"=> "Blue Dream Plants 1/31/2017",
			"PlantBatchType"=> "Clone",
			"PlantCount"=> 10,
			"LocationName"=> null,
			"StrainName"=> "Blue Dream",
			"PatientLicenseNumber"=> "X00003",
			"PlantedDate"=> "2017-01-31T00=>00=>00Z",
			"UnpackagedDate"=> "2017-01-31T00=>00=>00Z"
		  ]
	);

	return $RES->withJSON($ret);