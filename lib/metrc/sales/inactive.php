<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Sales;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
		"Id"=> 1,
		"DeliveryNumber"=> null,
		"SalesDateTime"=> "2016-01-01T17:35:45.000",
		"SalesCustomerType"=> "Consumer",
		"PatientLicenseNumber"=> null,
		"ConsumerId"=> "456DEF",
		"DriverName"=> "John Doe",
		"DriverOccupationalLicenseNumber"=> "1",
		"DriverVehicleLicenseNumber"=> "1",
		"VehicleMake"=> "Car",
		"VehicleModel"=> "Small",
		"VehicleLicensePlateNumber"=> "000000",
		"RecipientName"=> null,
		"PlannedRoute"=> "Drive to destination.",
		"EstimatedDepartureDateTime"=> "2017-04-04T11:00:00.000",
		"EstimatedArrivalDateTime"=> "2017-04-04T13:00:00.000",
		"ActualArrivalDateTime"=> null,
		"TotalPackages"=> 0,
		"TotalPrice"=> 0.0,
		"Transactions"=> [],
		"CompletedDateTime"=> null,
		"SalesDeliveryState"=> 0,
		"VoidedDate"=> null,
		"RecordedDateTime"=> "0001-01-01T00:00:00+00:00",
		"RecordedByUserName"=> null,
		"LastModified"=> "0001-01-01T00:00:00+00:00"
		],
		[
		"Id"=> 2,
		"DeliveryNumber"=> null,
		"SalesDateTime"=> "2016-01-02T17:37:23.000",
		"SalesCustomerType"=> "Consumer",
		"PatientLicenseNumber"=> null,
		"ConsumerId"=> "123ABC",
		"DriverName"=> "John Doe",
		"DriverOccupationalLicenseNumber"=> "1",
		"DriverVehicleLicenseNumber"=> "1",
		"VehicleMake"=> "Car",
		"VehicleModel"=> "Small",
		"VehicleLicensePlateNumber"=> "000000",
		"RecipientName"=> null,
		"PlannedRoute"=> "Drive to destination.",
		"EstimatedDepartureDateTime"=> "2017-04-04T11:00:00.000",
		"EstimatedArrivalDateTime"=> "2017-04-04T13:00:00.000",
		"ActualArrivalDateTime"=> null,
		"TotalPackages"=> 0,
		"TotalPrice"=> 0.0,
		"Transactions"=> [],
		"CompletedDateTime"=> null,
		"SalesDeliveryState"=> 0,
		"VoidedDate"=> null,
		"RecordedDateTime"=> "0001-01-01T00:00:00+00:00",
		"RecordedByUserName"=> null,
		"LastModified"=> "0001-01-01T00:00:00+00:00"
		]
);

return $RES->withJSON($ret);
