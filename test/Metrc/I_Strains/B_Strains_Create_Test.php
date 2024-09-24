<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\I_Strains;

class B_Strains_Create_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'strains/v1/create';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Name"=> "Spring Hill Kush",
				"TestingStatus"=> "None",
				"ThcLevel"=> 0.1865,
				"CbdLevel"=> 0.1075,
				"IndicaPercentage"=> 25.0,
				"SativaPercentage"=> 75.0
				],
				[
				"Name"=> "TN Orange Dream",
				"TestingStatus"=> "None",
				"ThcLevel"=> 0.075,
				"CbdLevel"=> 0.14,
				"IndicaPercentage"=> 25.0,
				"SativaPercentage"=> 75.0
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
