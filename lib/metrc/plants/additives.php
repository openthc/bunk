<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Metrc\Plants;

use OpenTHC\Bunk\Module\METRC;

switch ($_SERVER['REQUEST_METHOD']) {

	case 'GET':

		$ret = array(
			[
				"AdditiveTypeName"=> null,
				"ProductTradeName"=> "Round-Down",
				"EpaRegistrationNumber"=> null,
				"ProductSupplier"=> "MonSanta",
				"ApplicationDevice"=> "Spray",
				"AmountUnitOfMeasure"=> "Gallons",
				"TotalAmountApplied"=> 5.0,
				"PlantBatchId"=> null,
				"PlantBatchName"=> null,
				"PlantCount"=> 83
			]
		);

		return $RES->withJSON($ret);
			break;

	case 'POST':

		return $RES->write("");
		break;
}
