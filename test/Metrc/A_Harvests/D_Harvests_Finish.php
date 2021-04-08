<?php 

namespace Test\Metrc\A_Harvests;

class D_Harvests_Finish_Test extends \Test\Metrc_Test {
	
	protected $path = 'harvests/v1/finish';
	protected $body;

	protected function setUp() : void {
		$this->body = array(
			[
				"Id" => 1,
				"ActualDate" => "2015-12-15"
				],
				[
				"Id" => 2,
				"ActualDate" => "2015-12-15"
				]
		);
	}

	function test_post()
	{
		$res = $this->ghc->put($this->path, [ 'body' => $this->body]);
		$this->assertValidResponse($res);
	}
	
}