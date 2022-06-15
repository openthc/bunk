<?php

namespace OpenTHC\Bunk\Test\Metrc\A_Harvests;

class G_Harvests_Remove_Waste_Test extends \OpenTHC\Bunk\Test\Metrc_Test {

	protected $path = 'harvests/v1/removewaste';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Id" =>  1,
				"WasteType" =>  "Plant Material",
				"UnitOfWeight" =>  "Grams",
				"WasteWeight" =>  10.05,
				"ActualDate" =>  "2015-12-15"
			],
			[
				"Id" =>  2,
				"WasteType" =>  "Fibrous Material",
				"UnitOfWeight" =>  "Grams",
				"WasteWeight" =>  30.6,
				"ActualDate" =>  "2015-12-15"
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['body' => $this->body]);
		$this->assertValidResponse($res);
	}

}
