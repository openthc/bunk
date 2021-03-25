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
			"ReceiptNumber"=> null,
			"SalesDateTime"=> "2016-01-01T17:35:45.000",
			"SalesCustomerType"=> "Consumer",
			"PatientLicenseNumber"=> null,
			"CaregiverLicenseNumber"=> null,
			"IdentificationMethod"=> null,
			"TotalPackages"=> 0,
			"TotalPrice"=> 0.0,
			"Transactions"=> [],
			"IsFinal"=> false,
			"ArchivedDate"=> null,
			"RecordedDateTime"=> "0001-01-01T00:00:00+00:00",
			"RecordedByUserName"=> null,
			"LastModified"=> "0001-01-01T00:00:00+00:00"
		);

		return $RES->withJSON($ret);

		break;

	case 'POST':
	case 'PUT':
		$ret = array(
			[
				"SalesDateTime"=> "2016-10-04T16:44:53.000",
				"SalesCustomerType"=> "Consumer",
				"PatientLicenseNumber"=> null,
				"CaregiverLicenseNumber"=> null,
				"IdentificationMethod"=> null,
				"Transactions"=> [
					[
					"PackageLabel"=> "ABCDEF012345670000010331",
					"Quantity"=> 1.0,
					"UnitOfMeasure"=> "Ounces",
					"TotalAmount"=> 9.99
					],
					[
					"PackageLabel"=> "ABCDEF012345670000010332",
					"Quantity"=> 1.0,
					"UnitOfMeasure"=> "Ounces",
					"TotalAmount"=> 9.99
					]
				]
			]
		);

		return $RES->withJSON($ret);

		break;

	case 'Delete':
		return $RES->write("");
		break;
}
