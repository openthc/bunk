<?php 

namespace Test\Metrc\A_Harvests;

class F_Harvests_Move_Test extends \Test\Metrc_Test {

	protected $path = 'harvests/v1/move';

	protected $body;

	protected function setUp() : void {
		parent::setUp();
		$this->body = array(
			[
				"Id"=>  1,
				"HarvestName" =>  null,
				"DryingLocation" =>  "Flower Location A",
				"ActualDate" =>  "2019-05-29T00:00:00Z"
			],
			[
				"Id" =>  null,
				"HarvestName" =>  "2019-05-29-Flower Location A-H",
				"DryingLocation" =>  "Drying Location B",
				"ActualDate" =>  "2019-05-29T00:00:00Z"
			]
		);
	}

	function test_put()
	{
		$res = $this->ghc->put($this->path, [ 'json' => $this->body ]);
		$this->assertValidResponse($res);
	}
	
}