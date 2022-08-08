<?php
/**
 * SPDX-License-Identifier: MIT
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
	],
	[
		"Id" => 10,
		"Name" => "Alpha Strain 2022-04-20T16:20:00-07:00",
		"Type" => "Clone",
		"LocationId" => null,
		"LocationName" => null,	// @todo how does pipe come through in pipe?
		"LocationTypeName" => null,
		"StrainId" => 202,
		"StrainName" => "Alpha Strain",
		"PatientLicenseNumber" => null,
		"UntrackedCount" => 0,
		"TrackedCount" => 1, // guess
		"PackagedCount" => 0,
		"HarvestedCount" => 0,
		"DestroyedCount" => 0,
		"SourcePackageId" => null,
		"SourcePackageLabel" => null,
		"SourcePlantId" => null,
		"SourcePlantLabel" => null,
		"SourcePlantBatchId" => null,
		"SourcePlantBatchName" => null,
		"PlantedDate" => "2022-04-20",
		"LastModified" => "0001-01-01T00:00:00+00:00"
	]
);

return $RES->withJSON($ret);
