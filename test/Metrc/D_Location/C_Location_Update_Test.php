<?php 

namespace Test\Metrc\D_Location;

class C_Location_Test extends \Test\Metrc_Test {

	protected $path = 'locations/v1/update';
	protected $body;

	protected function setUp() : void {
		$this->body = array(
			[
				"Id" => 5,
				"Name" => "Harvest Location",
				"LocationTypeName" => "Default"
			],
			[
				"Id" => 6,
				"Name" => "Plants Location",
				"LocationTypeName" => "Planting"
			]
		);
	}

	function test_post()
	{
		$res = $this->ghc->post($this->path, ['body' => $this->body]);
		$this->assertValidResponse($res);
	}
	
}