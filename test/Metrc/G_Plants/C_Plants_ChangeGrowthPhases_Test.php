<?php

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class C_Plants_ChangeGrowthPhases_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plants/v1/changegrowthphases';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Id" => null,
				"Label" => "ABCDEF012345670000000001",
				"NewTag" => "ABCDEF012345670000020001",
				"GrowthPhase" => "Flowering",
				"NewLocation" => "Plants Location",
				"GrowthDate" => "2015-12-15"
				],
				[
				"Id" => 2,
				"Label" => null,
				"NewTag" => "ABCDEF012345670000020002",
				"GrowthPhase" => "Vegetative",
				"NewLocation" => "Harvest Location",
				"GrowthDate" => "2015-12-15"
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}
