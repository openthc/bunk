<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\F_PlantBatches;

class D_PlantBatches_CreatePlantings_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plantbatches/v1/createplantings';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Name"=> "B. Kush 5-30",
				"Type"=> "Clone",
				"Count"=> 25,
				"Strain"=> "Spring Hill Kush",
				"Location"=> null,
				"PatientLicenseNumber"=> "X00001",
				"ActualDate"=> "2015-12-15"
			],
			[
				"Name"=> "B. Kush 5-31",
				"Type"=> "Seed",
				"Count"=> 50,
				"Strain"=> "Spring Hill Kush",
				"Location"=> null,
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
