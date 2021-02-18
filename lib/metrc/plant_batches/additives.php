<?php

	namespace OpenTHC\Bunk\Metrc\Plant_Batches;
	use OpenTHC\Bunk\Module\METRC;

	$ret = array(
		[
			"AdditiveType" => "Fertilizer",
			"ProductTradeName" => "Wonder Sprout",
			"EpaRegistrationNumber" => null,
			"ProductSupplier" => "G Labs",
			"ApplicationDevice" => "GreatDistributor 210lb",
			"TotalAmountApplied" => 5.0,
			"TotalAmountUnitOfMeasure" => "Gallons",
			"ActiveIngredients" => [
			  [
				"Name" => "Phosphorous",
				"Percentage" => 30.0
			  ],
			  [
				"Name" => "Nitrogen",
				"Percentage" => 15.0
			  ],
			  [
				"Name" => "Potassium",
				"Percentage" => 15.0
			  ]
			],
			"PlantBatchName" => "AK-47 Clone 1/31/2017",
			"ActualDate" => "2019-12-15"
		  ],
		  [
			"AdditiveType" => "Pesticide",
			"ProductTradeName" => "Pure Triazine",
			"EpaRegistrationNumber" => null,
			"ProductSupplier" => "G Labs",
			"ApplicationDevice" => "GreatDistributor 210lb",
			"TotalAmountApplied" => 5.0,
			"TotalAmountUnitOfMeasure" => "Gallons",
			"ActiveIngredients" => [
			  [
				"Name" => "Phosphorous",
				"Percentage" => 30.0
			  ],
			  [
				"Name" => "Nitrogen",
				"Percentage" => 15.0
			  ],
			  [
				"Name" => "Potassium",
				"Percentage" => 15.0
			  ]
			],
			"PlantBatchName" => "AK-47 Clone 1/31/2017",
			"ActualDate" => "2019-12-15"
		  ]
	);

	return $RES->withJSON($ret);