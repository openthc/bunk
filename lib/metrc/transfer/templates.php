<?php

	namespace OpenTHC\Bunk\Metrc\Transfers;
	use OpenTHC\Bunk\Module\METRC;

	switch ($_SERVER['REQUEST_METHOD']) {

		case 'GET':

			$ret = array(
				{
					"Id" => 1,
					"ManifestNumber" => null,
					"ShipmentLicenseType" => 0,
					"ShipperFacilityLicenseNumber" => "123-ABC",
					"ShipperFacilityName" => "Lofty Med-Cultivation B",
					"Name" => "Template 1",
					"TransporterFacilityLicenseNumber" => "123-BCD",
					"TransporterFacilityName" => "Lofty Med-Dispensary",
					"DriverName" => "X",
					"DriverOccupationalLicenseNumber" => "",
					"DriverVehicleLicenseNumber" => "",
					"VehicleMake" => "X",
					"VehicleModel" => "X",
					"VehicleLicensePlateNumber" => "X",
					"DeliveryCount" => 1,
					"ReceivedDeliveryCount" => 0,
					"PackageCount" => 7,
					"ReceivedPackageCount" => 0,
					"ContainsPlantPackage" => false,
					"ContainsProductPackage" => false,
					"ContainsTradeSample" => false,
					"ContainsDonation" => false,
					"ContainsTestingSample" => false,
					"ContainsProductRequiresRemediation" => false,
					"ContainsRemediatedProductPackage" => false,
					"CreatedDateTime" => "2016-10-10T08:20:45-07:00",
					"CreatedByUserName" => null,
					"LastModified" => "0001-01-01T00:00:00+00:00",
					"DeliveryId" => 0,
					"RecipientFacilityLicenseNumber" => null,
					"RecipientFacilityName" => null,
					"ShipmentTypeName" => null,
					"ShipmentTransactionType" => null,
					"EstimatedDepartureDateTime" => "0001-01-01T00:00:00.000",
					"ActualDepartureDateTime" => null,
					"EstimatedArrivalDateTime" => "0001-01-01T00:00:00.000",
					"ActualArrivalDateTime" => null,
					"DeliveryPackageCount" => 0,
					"DeliveryReceivedPackageCount" => 0,
					"ReceivedDateTime" => null,
					"EstimatedReturnDepartureDateTime" => null,
					"ActualReturnDepartureDateTime" => null,
					"EstimatedReturnArrivalDateTime" => null,
					"ActualReturnArrivalDateTime" => null
				  ]
			);
		
			return $RES->withJSON($ret);

			break;

		case 'POST':

			$ret = array(
				[
					"Name" => "Template 1",
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
							"PackageLabel" => "ABCDEF012345670000010026",
							"WholesalePrice" => null
						  ],
						  [
							"PackageLabel" => "ABCDEF012345670000010027",
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
					"TransferTemplateId" => 1,
					"Name" => "Template 1",
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
						"TransferDestinationId" => 0,
						"RecipientLicenseNumber" => "123-XYZ",
						"TransferTypeName" => "Transfer",
						"PlannedRoute" => "I will drive down the road to the place.",
						"EstimatedDepartureDateTime" => "2018-03-06T09:15:00.000",
						"EstimatedArrivalDateTime" => "2018-03-06T12:24:00.000",
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
							"PackageLabel" => "ABCDEF012345670000010026",
							"WholesalePrice" => null
						  ],
						  [
							"PackageLabel" => "ABCDEF012345670000010027",
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
}