<?php 

namespace Test\Metrc\G_Plants;

class I_Plants_HarvestPlants_Test extends \Test\Metrc_Test {

	protected $path = 'plants/v1/harvestplants';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Plant"=> "ABCDEF012345670000010011",
				"Weight"=> 100.23,
				"UnitOfWeight"=> "Grams",
				"DryingLocation"=> "Harvest Location",
				"HarvestName"=> "2015-12-15-Harvest Location-H",
				"PatientLicenseNumber"=> "X00001",
				"ActualDate"=> "2015-12-15"
				],
				[
				"Plant"=> "ABCDEF012345670000010012",
				"Weight"=> 10.15,
				"UnitOfWeight"=> "Grams",
				"DryingLocation"=> "Harvest Location",
				"HarvestName"=> null,
				"PatientLicenseNumber"=> "X00002",
				"ActualDate"=> "2015-12-15"
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}
