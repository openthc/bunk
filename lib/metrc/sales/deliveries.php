<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Sales;

use OpenTHC\Bunk\Module\METRC;

switch ($_SERVER['REQUEST_METHOD']) {

	case 'GET':
		$ret = array(
			"Id"=> 1,
			"DeliveryNumber"=> null,
			"SalesDateTime"=> "2016-01-01T17:35:45.000",
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
		);

		return $RES->withJSON($ret);

		break;

	case 'POST':

			// $ret = array(
			// 	[
			// 		"SalesDateTime"=> date('Y-m-d g:ia'),
			// 		"SalesCustomerType"=> "Consumer",
			// 		"PatientLicenseNumber"=> null,
			// 		"ConsumerId"=> null,
			// 		"DriverName"=> "John Doe",
			// 		"DriverOccupationalLicenseNumber"=> "1",
			// 		"DriverVehicleLicenseNumber"=> "1",
			// 		"PhoneNumberForQuestions"=> "+1-123-456-7890",
			// 		"VehicleMake"=> "Car",
			// 		"VehicleModel"=> "Small",
			// 		"VehicleLicensePlateNumber"=> "000000",
			// 		"RecipientName"=> null,
			// 		"RecipientAddressStreet1"=> "1 Someplace Road",
			// 		"RecipientAddressStreet2"=> "Ste 9",
			// 		"RecipientAddressCity"=> "Denver",
			// 		"RecipientAddressState"=> "CO",
			// 		"RecipientAddressPostalCode"=> "11111",
			// 		"PlannedRoute"=> "Drive to destination.",
			// 		"EstimatedDepartureDateTime"=> date('Y-m-d g:ia'),
			// 		"EstimatedArrivalDateTime"=> date('Y-m-d g:ia'),
			// 		"Transactions"=> [
			// 		  [
			// 			"PackageLabel"=> "ABCDEF012345670000000001",
			// 			"Quantity"=> 1.0,
			// 			"UnitOfMeasure"=> "Ounces",
			// 			"TotalAmount"=> 9.99
			// 		  ],
			// 		  [
			// 			"PackageLabel"=> "ABCDEF012345670000000002",
			// 			"Quantity"=> 1.0,
			// 			"UnitOfMeasure"=> "Ounces",
			// 			"TotalAmount"=> 9.99
			// 		  ]
			// 		]
			// 	  ]
			// );

			return $RES->write("");
		break;

	case 'PUT':

			// $ret = array(
			// 	[
			// 		"Id"=> 6,
			// 		"SalesDateTime"=> "2017-04-04T10:10:19.000",
			// 		"SalesCustomerType"=> "Consumer",
			// 		"PatientLicenseNumber"=> null,
			// 		"ConsumerId"=> null,
			// 		"DriverName"=> "John Doe",
			// 		"DriverOccupationalLicenseNumber"=> "1",
			// 		"DriverVehicleLicenseNumber"=> "1",
			// 		"PhoneNumberForQuestions"=> "+1-123-456-7890",
			// 		"VehicleMake"=> "Car",
			// 		"VehicleModel"=> "Small",
			// 		"VehicleLicensePlateNumber"=> "000000",
			// 		"RecipientName"=> null,
			// 		"RecipientAddressStreet1"=> "1 Someplace Road",
			// 		"RecipientAddressStreet2"=> "Ste 9",
			// 		"RecipientAddressCity"=> "Denver",
			// 		"RecipientAddressState"=> "CO",
			// 		"RecipientAddressPostalCode"=> "11111",
			// 		"PlannedRoute"=> "Drive to destination.",
			// 		"EstimatedDepartureDateTime"=> "2017-04-04T11:00:00.000",
			// 		"EstimatedArrivalDateTime"=> "2017-04-04T13:00:00.000",
			// 		"Transactions"=> [
			// 		  [
			// 			"PackageLabel"=> "ABCDEF012345670000000001",
			// 			"Quantity"=> 1.0,
			// 			"UnitOfMeasure"=> "Ounces",
			// 			"TotalAmount"=> 9.99
			// 		  ],
			// 		  [
			// 			"PackageLabel"=> "ABCDEF012345670000000002",
			// 			"Quantity"=> 1.0,
			// 			"UnitOfMeasure"=> "Ounces",
			// 			"TotalAmount"=> 9.99
			// 		  ]
			// 		]
			// 	]
			// );

			return $RES->write("");
		break;

	case 'Delete':
		return $RES->write("");
}
