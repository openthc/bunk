<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\A_Harvests;

class D_Harvests_Finish_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'harvests/v1/finish';
	private $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Id" => 1,
				"ActualDate" => "2015-12-15"
				],
				[
				"Id" => 2,
				"ActualDate" => "2015-12-15"
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->put($this->path, [ 'json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
