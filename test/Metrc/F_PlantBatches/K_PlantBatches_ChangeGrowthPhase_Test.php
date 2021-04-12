<?php 

namespace Test\Metrc\F_PlantBatches;

class K_PlantBatches_ChangeGrowthPhase_Test extends \Test\Metrc_Test {

	protected $path = '/plantbatches/v1/changegrowthphase';
	protected $body;

	protected function setUp() : void {
		$this->body = array(
			[
				"Name" => "AK-47 Clone 1/31/2017",
				"Count" => 25,
				"StartingTag" => "ABCDEF012345670000020401",
				"GrowthPhase" => "Flowering",
				"NewLocation" => "Plants Location",
				"GrowthDate" => "2015-12-15",
				"PatientLicenseNumber" => "X00001"
			],
			[
				"Name" => "AK-47 Clone 1/31/2017",
				"Count" => 25,
				"StartingTag" => "ABCDEF012345670000020427",
				"GrowthPhase" => "Vegetative",
				"NewLocation" => "Harvest Location",
				"GrowthDate" => "2015-12-15",
				"PatientLicenseNumber" => "X00002"
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['body' => $this->body]);
		$this->assertValidResponse($res);
	}

}