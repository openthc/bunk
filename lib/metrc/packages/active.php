<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Packages;

use OpenTHC\Bunk\Module\METRC;

$ret = array();
$package = array(
	"Id" => 2,
	"Label" => "ABCDEF012345670000010042",
	"PackageType" => "Product",
	"SourceHarvestNames" => null,
	"LocationId" => null,
	"LocationName" => null,
	"LocationTypeName" => null,
	"Quantity" => 1.0,
	"UnitOfMeasureName" => "Ounces",
	"UnitOfMeasureAbbreviation" => "oz",
	"PatientLicenseNumber" => null,
	"ProductId" => 1,
	"ProductName" => "Buds",
	"ProductCategoryName" => "Buds",
	"ItemFromFacilityLicenseNumber" => null,
	"ItemFromFacilityName" => null,
	"ItemStrainName" => null,
	"ItemUnitCbdPercent" => null,
	"ItemUnitCbdContent" => null,
	"ItemUnitCbdContentUnitOfMeasureName" => null,
	"ItemUnitThcPercent" => null,
	"ItemUnitThcContent" => null,
	"ItemUnitThcContentUnitOfMeasureName" => null,
	"ItemUnitVolume" => null,
	"ItemUnitVolumeUnitOfMeasureName" => null,
	"ItemUnitWeight" => null,
	"ItemUnitWeightUnitOfMeasureName" => null,
	"ItemServingSize" => null,
	"ItemSupplyDurationDays" => null,
	"ItemUnitQuantity" => null,
	"ItemUnitQuantityUnitOfMeasureName" => null,
	"Note" => null,
	"PackagedDate" => "2014-11-29",
	"InitialLabTestingState" => "NotSubmitted",
	"LabTestingState" => "NotSubmitted",
	"LabTestingStateDate" => "2014-11-29",
	"IsProductionBatch" => false,
	"ProductionBatchNumber" => null,
	"SourceProductionBatchNumbers" => null,
	"IsTradeSample" => false,
	"IsDonation" => false,
	"IsDonationPersistent" => false,
	"SourcePackageIsDonation" => false,
	"IsTestingSample" => false,
	"IsProcessValidationTestingSample" => false,
	"ProductRequiresRemediation" => false,
	"ContainsRemediatedProduct" => false,
	"RemediationDate" => null,
	"ReceivedDateTime" => null,
	"ReceivedFromManifestNumber" => null,
	"ReceivedFromFacilityLicenseNumber" => null,
	"ReceivedFromFacilityName" => null,
	"IsOnHold" => false,
	"ArchivedDate" => null,
	"FinishedDate" => null,
	"LastModified" => "2021-02-17T15 =>10 =>04.6582141+00 =>00",
	"Item" => [
		"Id" => 1,
		"Name" => "Buds",
		"ProductCategoryName" => "Buds",
		"ProductCategoryType" => 0,
		"QuantityType" => 0,
		"DefaultLabTestingState" => 0,
		"UnitOfMeasureName" => null,
		"ApprovalStatus" => 0,
		"ApprovalStatusDateTime" => "0001-01-01T00 =>00 =>00+00 =>00",
		"StrainId" => null,
		"StrainName" => null,
		"AdministrationMethod" => null,
		"UnitCbdPercent" => null,
		"UnitCbdContent" => null,
		"UnitCbdContentUnitOfMeasureName" => null,
		"UnitCbdContentDose" => null,
		"UnitCbdContentDoseUnitOfMeasureName" => null,
		"UnitThcPercent" => null,
		"UnitThcContent" => null,
		"UnitThcContentUnitOfMeasureName" => null,
		"UnitThcContentDose" => null,
		"UnitThcContentDoseUnitOfMeasureName" => null,
		"UnitVolume" => null,
		"UnitVolumeUnitOfMeasureName" => null,
		"UnitWeight" => null,
		"UnitWeightUnitOfMeasureName" => null,
		"ServingSize" => null,
		"SupplyDurationDays" => null,
		"NumberOfDoses" => null,
		"UnitQuantity" => null,
		"UnitQuantityUnitOfMeasureName" => null,
		"Ingredients" => null,
		"Description" => null,
		"IsUsed" => false
	]
);
$ret[] = $package;

return $RES->withJSON($ret);
