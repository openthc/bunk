<?php

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class M_Plants_MovePlants_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plants/v1/moveplants';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Id"=> null,
				"Label"=> "ABCDEF012345670000000001",
				"Location"=> "Plants Location",
				"ActualDate"=> "2015-12-15"
				],
				[
				"Id"=> 2,
				"Label"=> null,
				"Location"=> "Plants Location",
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
