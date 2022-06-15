<?php

namespace OpenTHC\Bunk\Test\Metrc\E_Packages;

class D_Packages_Change_Item_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'packages/v1/change/item';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Label"=> "ABCDEF012345670000010041",
				"Item"=> "Shake"
			],
			[
				"Label"=> "ABCDEF012345670000010042",
				"Item"=> "Shake"
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
