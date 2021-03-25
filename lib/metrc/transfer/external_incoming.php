<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Transfers;

use OpenTHC\Bunk\Module\METRC;

switch ($_SERVER['REQUEST_METHOD']) {

	case 'POST':

		$ret = array(
			[
				"ShipperLicenseNumber" => "123-ABC",
				"ShipperName" => "Lofty Med-Cultivation B",
				"ShipperMainPhoneNumber" => "123-456-7890",
				"ShipperAddress1" => "123 Real Street",
				"ShipperAddress2" => null,
				"ShipperAddressCity" => "Somewhere",
				"ShipperAddressState" => "CO",
				"ShipperAddressPostalCode" => null,
				"TransporterFacilityLicenseNumber" => null,
				"DriverOccupationalLicenseNumber" => null,
				"DriverName" => null,
				"DriverLicenseNumber" => null,
				"PhoneNumberForQuestions" => null,
				"VehicleMake" => null,
				"VehicleModel" => null,
				"VehicleLicensePlateNumber" => null,
				"Destinations" => [
					[
						"RecipientLicenseNumber" => "123-XYZ",
						"TransferTypeName" => "Transfer",
						"PlannedRoute" => "I will drive down the road to the place.",
						"EstimatedDepartureDateTime" => "2018-03-06T09:15:00.000",
						"EstimatedArrivalDateTime" => "2018-03-06T12:24:00.000",
						"GrossWeight" => null,
						"GrossUnitOfWeightId" => null,
						"Transporters" => [
							[
								"TransporterFacilityLicenseNumber" => "123-ABC",
								"DriverOccupationalLicenseNumber" => "50",
								"DriverName" => "X",
								"DriverLicenseNumber" => "5",
								"PhoneNumberForQuestions" => "18005555555",
								"VehicleMake" => "X",
								"VehicleModel" => "X",
								"VehicleLicensePlateNumber" => "X",
								"IsLayover" => false,
								"EstimatedDepartureDateTime" => "2018-03-06T12:00:00.000",
								"EstimatedArrivalDateTime" => "2018-03-06T21:00:00.000",
								"TransporterDetails" => null
							]
						],
						"Packages" => [
							[
								"ItemName" => "Buds",
								"Quantity" => 10.0,
								"UnitOfMeasureName" => "Ounces",
								"PackagedDate" => "2018-02-04T00:00:00Z",
								"GrossWeight" => null,
								"GrossUnitOfWeightName" => null,
								"WholesalePrice" => null
							],
							[
								"ItemName" => "Buds",
								"Quantity" => 9.5,
								"UnitOfMeasureName" => "Ounces",
								"PackagedDate" => "2018-03-06T00:00:00Z",
								"GrossWeight" => null,
								"GrossUnitOfWeightName" => null,
								"WholesalePrice" => null
							]
						]
					]
				]
			]
		);

		return $RES->withJSON($ret);

		break;

	case 'PUT':

		$ret = array(
			[
				"TransferId" => 1,
				"ShipperLicenseNumber" => "123-ABC",
				"ShipperName" => "Lofty Med-Cultivation B",
				"ShipperMainPhoneNumber" => null,
				"ShipperAddress1" => null,
				"ShipperAddress2" => null,
				"ShipperAddressCity" => null,
				"ShipperAddressState" => null,
				"ShipperAddressPostalCode" => null,
				"TransporterFacilityLicenseNumber" => null,
				"DriverOccupationalLicenseNumber" => null,
				"DriverName" => null,
				"DriverLicenseNumber" => null,
				"PhoneNumberForQuestions" => null,
				"VehicleMake" => null,
				"VehicleModel" => null,
				"VehicleLicensePlateNumber" => null,
				"Destinations" => [
					[
						"TransferDestinationId" => null,
						"RecipientLicenseNumber" => "123-XYZ",
						"TransferTypeName" => "Transfer",
						"PlannedRoute" => "I will drive down the road to the place.",
						"EstimatedDepartureDateTime" => "2018-03-06T09:15:00.000",
						"EstimatedArrivalDateTime" => "2018-03-06T12:24:00.000",
						"GrossWeight" => null,
						"GrossUnitOfWeightId" => null,
						"Transporters" => [
							[
								"TransporterFacilityLicenseNumber" => "123-ABC",
								"DriverOccupationalLicenseNumber" => "50",
								"DriverName" => "X",
								"DriverLicenseNumber" => "5",
								"PhoneNumberForQuestions" => "18005555555",
								"VehicleMake" => "X",
								"VehicleModel" => "X",
								"VehicleLicensePlateNumber" => "X",
								"IsLayover" => false,
								"EstimatedDepartureDateTime" => "2018-03-06T12:00:00.000",
								"EstimatedArrivalDateTime" => "2018-03-06T21:00:00.000",
								"TransporterDetails" => null
							]
						],
						"Packages" => [
							[
								"ItemName" => "Buds",
								"Quantity" => 10.0,
								"UnitOfMeasureName" => "Ounces",
								"PackagedDate" => "2018-02-04T00:00:00Z",
								"GrossWeight" => null,
								"GrossUnitOfWeightName" => null,
								"WholesalePrice" => null
							],
							[
								"ItemName" => "Buds",
								"Quantity" => 9.5,
								"UnitOfMeasureName" => "Ounces",
								"PackagedDate" => "2018-03-06T00:00:00Z",
								"GrossWeight" => null,
								"GrossUnitOfWeightName" => null,
								"WholesalePrice" => null
							]
						]
					]
				]
			]
		);

		return $RES->withJSON($ret);

		break;

	case 'Delete':

		return $RES->write("");
}
