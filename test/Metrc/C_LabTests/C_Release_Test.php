<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\C_LabTests;

class C_Release_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'labtests/v1/release';
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
