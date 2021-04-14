<?php 

namespace Test\Metrc\E_Packages;

class O_Packages_Remediate_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/remediate';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"PackageLabel" => "ABCDEF012345670000020201",
				"RemediationMethodName" => "Further Drying",
				"RemediationDate" => "2016-10-17",
				"RemediationSteps" => "Used hair dryer"
			],
			[
				"PackageLabel" => "ABCDEF012345670000020201",
				"RemediationMethodName" => "Further Drying",
				"RemediationDate" => "2016-10-17",
				"RemediationSteps" => "Used natural sunlight"
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}
