<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\D_Location;

class C_Update_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'locations/v1/update';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Id" => 5,
				"Name" => "Harvest Location",
				"LocationTypeName" => "Default"
			],
			[
				"Id" => 6,
				"Name" => "Plants Location",
				"LocationTypeName" => "Planting"
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
