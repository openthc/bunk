<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\E_Packages;

class J_Packages_Finish_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'packages/v1/finish';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Label"=> "ABCDEF012345670000010041",
				"ActualDate"=> "2015-12-15"
			],
			[
				"Label"=> "ABCDEF012345670000010042",
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
