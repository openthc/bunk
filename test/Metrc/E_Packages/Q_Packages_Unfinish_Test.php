<?php 

namespace Test\Metrc\E_Packages;

class Q_Packages_Unfinish_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/unfinish';
	protected $body;

	protected function setUp() : void {
		$this->body = array(
			[
				"Label"=> "ABCDEF012345670000010041",
			],
			[
				"Label"=> "ABCDEF012345670000010042",
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['body' => $this->body]);
		$this->assertValidResponse($res);
	}

}