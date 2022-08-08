<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Sales;

use OpenTHC\Bunk\Module\METRC;

$ret = array(
	[
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
		],
		[
		"Id"=> 2,
		"ReceiptNumber"=> null,
		"SalesDateTime"=> "2016-01-02T17:37:23.000",
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
		]
);

return $RES->withJSON($ret);
