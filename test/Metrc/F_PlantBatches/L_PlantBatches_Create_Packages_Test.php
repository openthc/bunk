<?php

namespace OpenTHC\Bunk\Test\Metrc\F_PlantBatches;

class L_PlantBatches_Create_Packages_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plantbatches/v1/createpackages';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Id"=> null,
				"PlantBatch"=> "Demo Plant Batch 1",
				"Count"=> 10,
				"Location"=> null,
				"Item"=> "Immature Plants",
				"Tag"=> "ABCDEF012345670000020201",
				"PatientLicenseNumber"=> "P00001",
				"Note"=> "This is a note.",
				"IsTradeSample"=> false,
				"IsDonation"=> false,
				"ActualDate"=> "2015-12-15"
			],
			[
				"Id"=> 5,
				"PlantBatch"=> null,
				"Count"=> 10,
				"Location"=> null,
				"Item"=> "Immature Plants",
				"Tag"=> "ABCDEF012345670000020202",
				"PatientLicenseNumber"=> "P00002",
				"Note"=> "",
				"IsTradeSample"=> true,
				"IsDonation"=> false,
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
