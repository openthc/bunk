<?php 

namespace Test\Metrc\F_PlantBatches;

class E_PlantBatches_Destroy_Test extends \Test\Metrc_Test {

	protected $path = 'plantbatches/v1/destroy';
	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"PlantBatch" => "AK-47 Clone 1/31/2017",
				"Count" => 25,
				"ReasonNote" => "",
				"ActualDate" => "2015-12-15"
			],
			[
				"PlantBatch" => "AK-47 Clone 1/31/2017",
				"Count" => 10,
				"ReasonNote" => "McQueen ran over the plants. Poor little plants. =(",
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
