<?php

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class E_Plants_Create_Plantings_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plants/v1/create/plantings';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body =  array(
			[
				"PlantLabel" => "ABCDEF012345670000010011",
				"PlantBatchName" => "Demo Plant Batch 1",
				"PlantBatchType" => "Clone",
				"PlantCount" => 3,
				"LocationName" => null,
				"StrainName" => "Spring Hill Kush",
				"PatientLicenseNumber" => "X00001",
				"ActualDate" => "2016-10-18T13:11:03Z"
			  ],
			  [
				"PlantLabel" => "ABCDEF012345670000010012",
				"PlantBatchName" => "Demo Plant Batch 2",
				"PlantBatchType" => "Seed",
				"PlantCount" => 2,
				"LocationName" => null,
				"StrainName" => "Spring Hill Kush",
				"PatientLicenseNumber" => "X00002",
				"ActualDate" => "2016-10-18T13:11:03Z"
			  ]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}
