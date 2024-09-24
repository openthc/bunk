<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\D_Location;

class A_Create_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'locations/v1/create';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Name" => "Harvest Location",
				"LocationTypeName" => "Default"
			],
			[
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
