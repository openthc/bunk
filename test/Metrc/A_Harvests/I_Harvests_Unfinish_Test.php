<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\A_Harvests;

class I_Harvests_Unfinish_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'harvests/v1/unfinish';
	protected $body;

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

	function test_put()
	{
		$res = $this->ghc->put($this->path, [ 'json' => $this->body ]);
		$this->assertValidResponse($res);
	}

}
