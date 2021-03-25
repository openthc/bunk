<?php

	namespace OpenTHC\Bunk\Metrc\Transfers;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"Id"=> 1,
			"ManifestNumber"=> "0000000001",
			"ShipmentLicenseType"=> 0,
			"ShipperFacilityLicenseNumber"=> "123-ABC",
			"ShipperFacilityName"=> "Lofty Med-Cultivation B",
			"Name"=> null,
			"TransporterFacilityLicenseNumber"=> "123-BCD",
			"TransporterFacilityName"=> "Lofty Med-Dispensary",
			"DriverName"=> "X",
			"DriverOccupationalLicenseNumber"=> "",
			"DriverVehicleLicenseNumber"=> "",
			"VehicleMake"=> "X",
			"VehicleModel"=> "X",
			"VehicleLicensePlateNumber"=> "X",
			"DeliveryCount"=> 1,
			"ReceivedDeliveryCount"=> 0,
			"PackageCount"=> 7,
			"ReceivedPackageCount"=> 0,
			"ContainsPlantPackage"=> false,
			"ContainsProductPackage"=> false,
			"ContainsTradeSample"=> false,
			"ContainsDonation"=> false,
			"ContainsTestingSample"=> false,
			"ContainsProductRequiresRemediation"=> false,
			"ContainsRemediatedProductPackage"=> false,
			"CreatedDateTime"=> "2016-10-10T08:20:45-07:00",
			"CreatedByUserName"=> null,
			"LastModified"=> "0001-01-01T00:00:00+00:00",
			"DeliveryId"=> 0,
			"RecipientFacilityLicenseNumber"=> null,
			"RecipientFacilityName"=> null,
			"ShipmentTypeName"=> null,
			"ShipmentTransactionType"=> null,
			"EstimatedDepartureDateTime"=> "0001-01-01T00:00:00.000",
			"ActualDepartureDateTime"=> null,
			"EstimatedArrivalDateTime"=> "0001-01-01T00:00:00.000",
			"ActualArrivalDateTime"=> null,
			"DeliveryPackageCount"=> 0,
			"DeliveryReceivedPackageCount"=> 0,
			"ReceivedDateTime"=> null,
			"EstimatedReturnDepartureDateTime"=> null,
			"ActualReturnDepartureDateTime"=> null,
			"EstimatedReturnArrivalDateTime"=> null,
			"ActualReturnArrivalDateTime"=> null
		  ]
	);

	return $RES->withJSON($ret);