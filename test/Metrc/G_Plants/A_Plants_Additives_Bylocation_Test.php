<?php

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class A_Plants_Additives_Bylocation_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plants/v1/additives/bylocation';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
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
				"LocationName" => "Plants Location",
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
				"LocationName" => "Plants Location",
				"ActualDate" => "2019-12-15"
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}
