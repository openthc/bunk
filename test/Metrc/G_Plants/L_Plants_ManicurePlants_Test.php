<?php

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class L_Plants_ManicurePlants_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plants/v1/manicureplants';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Plant" => "ABCDEF012345670000000001",
				"Weight" => 100.23,
				"UnitOfWeight" => "Grams",
				"DryingLocation" => "Plants Location",
				"HarvestName" => null,
				"PatientLicenseNumber" => "X00001",
				"ActualDate" => "2015-12-15"
				],
				[
				"Plant" => "ABCDEF012345670000000001",
				"Weight" => 50.10,
				"UnitOfWeight" => "Grams",
				"DryingLocation" => "Plants Location",
				"HarvestName" => "2015-12-15-Harvest Location-M",
				"PatientLicenseNumber" => "X00002",
				"ActualDate" => "2015-12-15"
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}
