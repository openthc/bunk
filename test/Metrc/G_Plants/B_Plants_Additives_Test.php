<?php 

namespace Test\Metrc\G_Plants;

class B_Plants_Additives_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/additives';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
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
				"ActualDate"=> date('Y-m-d')
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
				"ActualDate"=> date('Y-m-d')
			]
		);
	}

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}
