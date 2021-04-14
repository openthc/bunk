<?php 

namespace Test\Metrc\E_Packages;

class E_Packages_Change_Location_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/change/locations';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Label"=> "ABCDEF012345670000010041",
				"Location"=> "Back Location",
				"MoveDate"=> "0001-01-01"
			],
			[
				"Label"=> "ABCDEF012345670000010042",
				"Location"=> "Storage Closet",
				"MoveDate"=> "2018-03-15"
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}
