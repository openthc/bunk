<?php
/**
 *
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

	case 'POST':

		$ret = array(
			[
				"AdditiveType"=> "Fertilizer",
				"ProductTradeName"=> "Wonder Sprout",
				"EpaRegistrationNumber"=> null,
				"ProductSupplier"=> "G Labs",
				"ApplicationDevice"=> "GreatDistributor 210lb",
				"TotalAmountApplied"=> 5.0,
				"TotalAmountUnitOfMeasure"=> "Gallons",
				"ActiveIngredients"=> [
				[
					"Name"=> "Phosphorous",
					"Percentage"=> 30.0
				],
				[
					"Name"=> "Nitrogen",
					"Percentage"=> 15.0
				],
				[
					"Name"=> "Potassium",
					"Percentage"=> 15.0
				]
				],
				"PlantLabels"=> [
				"ABCDEF012345670000010011",
				"ABCDEF012345670000010012"
				],
				"ActualDate"=> "2019-12-15"
			],
			[
				"AdditiveType"=> "Pesticide",
				"ProductTradeName"=> "Pure Triazine",
				"EpaRegistrationNumber"=> null,
				"ProductSupplier"=> "G Labs",
				"ApplicationDevice"=> "GreatDistributor 210lb",
				"TotalAmountApplied"=> 5.0,
				"TotalAmountUnitOfMeasure"=> "Gallons",
				"ActiveIngredients"=> [
				[
					"Name"=> "Phosphorous",
					"Percentage"=> 30.0
				],
				[
					"Name"=> "Nitrogen",
					"Percentage"=> 15.0
				],
				[
					"Name"=> "Potassium",
					"Percentage"=> 15.0
				]
				],
				"PlantLabels"=> [
				"ABCDEF012345670000010013",
				"ABCDEF012345670000010014"
				],
				"ActualDate"=> "2019-12-15"
			]
		);

		return $RES->withJSON($ret);
}
