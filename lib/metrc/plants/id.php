<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Plants;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	"Id"=> 24,
	"Label"=> "ABCDEF012345670000000024",
	"State"=> "Tracked",
	"GrowthPhase"=> "Vegetative",
	"PlantBatchId"=> 1,
	"PlantBatchName"=> "Demo Plant Batch",
	"PlantBatchTypeName"=> "Seed",
	"StrainId"=> 1,
	"StrainName"=> "Spring Hill Kush",
	"LocationId"=> 2,
	"LocationName"=> "Plants Location",
	"LocationTypeName"=> null,
	"PatientLicenseNumber"=> null,
	"HarvestId"=> null,
	"HarvestedUnitOfWeightName"=> null,
	"HarvestedUnitOfWeightAbbreviation"=> null,
	"HarvestedWetWeight"=> null,
	"HarvestCount"=> 0,
	"IsOnHold"=> false,
	"PlantedDate"=> "2014-10-10",
	"VegetativeDate"=> "2014-10-20",
	"FloweringDate"=> null,
	"HarvestedDate"=> null,
	"DestroyedDate"=> null,
	"DestroyedNote"=> null,
	"DestroyedByUserName"=> null,
	"LastModified"=> "0001-01-01T00:00:00+00:00"
);

return $RES->withJSON($ret);
