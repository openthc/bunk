<?php

	namespace OpenTHC\Bunk\Metrc\Plants;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id" => 10011,
			"Label" => "ABCDEF012345670000010011",
			"State" => "Tracked",
			"GrowthPhase" => "Flowering",
			"PlantBatchId" => 2,
			"PlantBatchName" => "Demo Plant Batch",
			"PlantBatchTypeName" => "Clone",
			"StrainId" => 1,
			"StrainName" => "Spring Hill Kush",
			"LocationId" => 2,
			"LocationName" => "Plants Location",
			"LocationTypeName" => null,
			"PatientLicenseNumber" => null,
			"HarvestId" => null,
			"HarvestedUnitOfWeightName" => null,
			"HarvestedUnitOfWeightAbbreviation" => null,
			"HarvestedWetWeight" => null,
			"HarvestCount" => 0,
			"IsOnHold" => true,
			"PlantedDate" => "2014-10-10",
			"VegetativeDate" => "2014-10-20",
			"FloweringDate" => "2014-11-09",
			"HarvestedDate" => null,
			"DestroyedDate" => null,
			"DestroyedNote" => null,
			"DestroyedByUserName" => null,
			"LastModified" => "0001-01-01T00:00:00+00:00"
		  ],
		  [
			"Id" => 10012,
			"Label" => "ABCDEF012345670000010012",
			"State" => "Tracked",
			"GrowthPhase" => "Flowering",
			"PlantBatchId" => 2,
			"PlantBatchName" => "Demo Plant Batch",
			"PlantBatchTypeName" => "Clone",
			"StrainId" => 1,
			"StrainName" => "Spring Hill Kush",
			"LocationId" => 2,
			"LocationName" => "Plants Location",
			"LocationTypeName" => null,
			"PatientLicenseNumber" => null,
			"HarvestId" => null,
			"HarvestedUnitOfWeightName" => null,
			"HarvestedUnitOfWeightAbbreviation" => null,
			"HarvestedWetWeight" => null,
			"HarvestCount" => 0,
			"IsOnHold" => true,
			"PlantedDate" => "2014-10-10",
			"VegetativeDate" => "2014-10-20",
			"FloweringDate" => "2014-11-09",
			"HarvestedDate" => null,
			"DestroyedDate" => null,
			"DestroyedNote" => null,
			"DestroyedByUserName" => null,
			"LastModified" => "0001-01-01T00:00:00+00:00"
		  ]
	);

	return $RES->withJSON($ret);