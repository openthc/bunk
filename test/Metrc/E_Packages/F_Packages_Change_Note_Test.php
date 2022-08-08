<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\E_Packages;

class F_Packages_Change_Note_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'packages/v1/change/note';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"PackageLabel"=> "ABCDEF012345670000010041",
				"Note"=> "Package note here."
				],
				[
				"PackageLabel"=> "ABCDEF012345670000010042",
				"Note"=> ""
				]
		);
	}

	function test_put()
	{
		$res = $this->ghc->put($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
