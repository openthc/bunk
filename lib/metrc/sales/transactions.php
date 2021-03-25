<?php

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
			
			$ret = array(
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
			);
		
			return $RES->withJSON($ret);

			break;

		case 'Delete':
			return $RES->write("");
			break;
	}