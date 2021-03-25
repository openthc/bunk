<?php
/**
 *
 */

namespace OpenTHC\Bunk\METRC\Harvests;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Id" => 1,
		"Name" => "2014-11-19-Harvest Location-M",
		"HarvestType" => "Product",
		"SourceStrainCount" => 0,
		"SourceStrainNames" => null,
		"Strains" => [],
		"DryingLocationId" => 1,
		"DryingLocationName" => "Harvest Location",
		"DryingLocationTypeName" => null,
		"PatientLicenseNumber" => null,
		"CurrentWeight" => 0.0,
		"TotalWasteWeight" => 0.0,
		"PlantCount" => 70,
		"TotalWetWeight" => 40.0,
		"TotalRestoredWeight" => 0.0,
		"PackageCount" => 5,
		"TotalPackagedWeight" => 0.0,
		"UnitOfWeightName" => "Ounces",
		"LabTestingState" => null,
		"LabTestingStateDate" => null,
		"IsOnHold" => false,
		"HarvestStartDate" => date('m-d-Y'),
		"FinishedDate" => null,
		"ArchivedDate" => null,
		"LastModified" => "2014-11-19T00 =>00 =>00+00 =>00"
	],
	[
		"Id" => 2,
		"Name" => "2014-11-19-Harvest Location-H",
		"HarvestType" => "WholePlant",
		"SourceStrainCount" => 0,
		"SourceStrainNames" => null,
		"Strains" => [],
		"DryingLocationId" => 1,
		"DryingLocationName" => "Harvest Location",
		"DryingLocationTypeName" => null,
		"PatientLicenseNumber" => null,
		"CurrentWeight" => 0.0,
		"TotalWasteWeight" => 0.0,
		"PlantCount" => 70,
		"TotalWetWeight" => 40.0,
		"TotalRestoredWeight" => 0.0,
		"PackageCount" => 0,
		"TotalPackagedWeight" => 0.0,
		"UnitOfWeightName" => "Ounces",
		"LabTestingState" => null,
		"LabTestingStateDate" => null,
		"IsOnHold" => false,
		"HarvestStartDate" => "2014-11-19",
		"FinishedDate" => null,
		"ArchivedDate" => null,
		"LastModified" => "2014-11-19T00 =>00 =>00+00 =>00"
	]
);

return $RES->withJSON($ret);
