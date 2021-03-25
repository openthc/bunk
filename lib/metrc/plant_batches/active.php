<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Plant_Batches;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Id" => 5,
		"Name" => "Demo Plant Batch 1",
		"Type" => "Seed",
		"LocationId" => null,
		"LocationName" => null,
		"LocationTypeName" => null,
		"StrainId" => 1,
		"StrainName" => "Spring Hill Kush",
		"PatientLicenseNumber" => null,
		"UntrackedCount" => 80,
		"TrackedCount" => 10,
		"PackagedCount" => 0,
		"HarvestedCount" => 0,
		"DestroyedCount" => 40,
		"SourcePackageId" => null,
		"SourcePackageLabel" => null,
		"SourcePlantId" => null,
		"SourcePlantLabel" => null,
		"SourcePlantBatchId" => null,
		"SourcePlantBatchName" => null,
		"PlantedDate" => "2014-10-10",
		"LastModified" => "0001-01-01T00:00:00+00:00"
	],
	[
		"Id" => 6,
		"Name" => "Demo Plant Batch 2",
		"Type" => "Clone",
		"LocationId" => null,
		"LocationName" => null,
		"LocationTypeName" => null,
		"StrainId" => 1,
		"StrainName" => "Spring Hill Kush",
		"PatientLicenseNumber" => null,
		"UntrackedCount" => 50,
		"TrackedCount" => 20,
		"PackagedCount" => 0,
		"HarvestedCount" => 0,
		"DestroyedCount" => 70,
		"SourcePackageId" => null,
		"SourcePackageLabel" => null,
		"SourcePlantId" => null,
		"SourcePlantLabel" => null,
		"SourcePlantBatchId" => null,
		"SourcePlantBatchName" => null,
		"PlantedDate" => "2014-10-10",
		"LastModified" => "0001-01-01T00:00:00+00:00"
	]
);

return $RES->withJSON($ret);
