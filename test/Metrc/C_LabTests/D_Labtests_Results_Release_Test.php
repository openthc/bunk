<?php

namespace Test\Metrc\C_LabTests;

class D_Results_Release_Test extends \Test\Metrc_Test {

	protected $path = 'labtests/v1/results/release';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"PackageLabel" => "ABCDEF012345670000010041"
			],
			[
				"PackageLabel" => "ABCDEF012345670000010042"
			]
		);
	}

	function test_put()
	{
		$res = $this->ghc->put($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}