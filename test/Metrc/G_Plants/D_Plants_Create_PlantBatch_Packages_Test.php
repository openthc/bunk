<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class D_Plants_Create_PlantBatch_Packages_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plants/v1/create/plantbatch/packages';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"PlantLabel" => "ABCDEF012345670000000011",
				"PackageTag" => "ABCDEF012345670000010011",
				"PlantBatchType" => "Clone",
				"Item" => "Blue Dream Clones",
				"Location" => null,
				"Note" => null,
				"IsTradeSample" => false,
				"PatientLicenseNumber" => null,
				"IsDonation" => false,
				"Count" => 25,
				"ActualDate"=> "2020-01-15T12:25:43Z"
				],
				[
				"PlantLabel" => "ABCDEF012345670000000012",
				"PackageTag" => "ABCDEF012345670000010013",
				"PlantBatchType" => "Seed",
				"Item" => "Blue Dream Seeds",
				"Location" => "Package Room 1",
				"Note" => null,
				"IsTradeSample" => false,
				"PatientLicenseNumber" => null,
				"IsDonation" => false,
				"Count" => 25,
				"ActualDate" => "2020-01-15T12:36:32Z"
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}
