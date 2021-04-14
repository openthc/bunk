<?php
/**
 *
 */

namespace OpenTHC\Bunk\Metrc\Sales;

use OpenTHC\Bunk\Module\METRC;

switch ($_SERVER['REQUEST_METHOD']) {

	case 'GET':

		$ret = array(
			[
				"SalesDate"=> "2015-01-08",
				"TotalTransactions"=> 40,
				"TotalPackages"=> 40,
				"TotalPrice"=> 399.6
			],
			[
				"SalesDate"=> "2015-01-14",
				"TotalTransactions"=> 1,
				"TotalPackages"=> 1,
				"TotalPrice"=> 85.0
			]
		);

		return $RES->withJSON($ret);

		break;

	case 'POST':
	case 'PUT':
	case 'Delete':
		return $RES->write("");
		break;
}
