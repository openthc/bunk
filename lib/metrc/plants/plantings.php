<?php
/**
 * SPDX-License-Identifier: MIT
 */

	namespace OpenTHC\Bunk\Metrc\Plants;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"PlantLabel" => "ABCDEF012345670000010011",
			"PlantBatchName" => "Demo Plant Batch 1",
			"PlantBatchType" => "Clone",
			"PlantCount" => 3,
			"LocationName" => null,
			"StrainName" => "Spring Hill Kush",
			"PatientLicenseNumber" => "X00001",
			"ActualDate" => "2016-10-18T13:11:03Z"
		  ],
		  [
			"PlantLabel" => "ABCDEF012345670000010012",
			"PlantBatchName" => "Demo Plant Batch 2",
			"PlantBatchType" => "Seed",
			"PlantCount" => 2,
			"LocationName" => null,
			"StrainName" => "Spring Hill Kush",
			"PatientLicenseNumber" => "X00002",
			"ActualDate" => "2016-10-18T13:11:03Z"
		  ]
	);

	return $RES->withJSON($ret);
