<?php
/**
 * SPDX-License-Identifier: MIT
 */

namespace OpenTHC\Bunk\Test\Metrc\G_Plants;

class F_Plants_DestroyPlants_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'plants/v1/destroyplants';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Id" => null,
				"Label" => "ABCDEF012345670000000001",
				"WasteMethodName" => "Compost",
				"WasteMaterialMixed" => "Soil",
				"WasteWeight" => 15.69,
				"WasteUnitOfMeasureName" => "grams",
				"WasteReasonName" => "Destroy",
				"ReasonNote" => "Had to go.",
				"ActualDate" => "2015-12-15"
				],
				[
				"Id" => 2,
				"Label" => null,
				"WasteMethodName" => "Grinder",
				"WasteMaterialMixed" => "Soil",
				"WasteWeight" => 15.69,
				"WasteUnitOfMeasureName" => "grams",
				"WasteReasonName" => "Destroy",
				"ReasonNote" => "Had to go.",
				"ActualDate" => "2015-12-15"
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['json' => $this->body]);
		$this->assertValidResponse($res);
	}
}
