<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\F_PlantBatches;

class G_PlantBatches_MovePlantBatches_Test extends \OpenTHC\Bunk\Test\Metrc\Base {

	protected $path = 'plantbatches/v1/moveplantbatches';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Name" => "AK-47 Clone 1/31/2017",
				"Location" => "Plants Location",
				"MoveDate" => "2015-12-15"
			],
			[
				"Name" => "Metrc Bliss 5/30/2018",
				"Location" => "Plants Location",
				"MoveDate" => "2018-01-05"
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->put($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}

}
