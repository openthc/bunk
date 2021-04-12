<?php 

namespace Test\Metrc\F_PlantBatches;

class H_PlantBatches_Split_Test extends \Test\Metrc_Test {

	protected $path = 'plantbatches/v1/split';
	protected $body;

	protected function setUp() : void { 
		$this->body = array(
			[
				"PlantBatch"=> "B. Kush 5-30",
				"GroupName"=> "New Plant Batch",
				"Type"=> "Clone",
				"Count"=> 25,
				"Location"=> null,
				"Strain"=> "Spring Hill Kush",
				"PatientLicenseNumber"=> "X00001",
				"ActualDate"=> "2015-12-15T00=>00=>00Z"
			],
			[
				"PlantBatch"=> "B. Kush 5-31",
				"GroupName"=> "New Plant Batch",
				"Type"=> "Seed",
				"Count"=> 50,
				"Location"=> null,
				"Strain"=> "Spring Hill Kush",
				"PatientLicenseNumber"=> null,
				"ActualDate"=> "2015-12-15T00=>00=>00Z"
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['body' => $this->body]);
		$this->assertValidResponse($res);
	}

}