<?php 

namespace Test\Metrc\A_Harvests;

class I_Harvests_Unfinish_Test extends \Test\Metrc_Test {
	
	protected $path = 'harvests/v1/unfinish';
	protected $body;

	protected function setUp() : void {
		$this->body = $ret = array(
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

	function test_put()
	{
		$res = $this->ghc->put($this->path, [ 'body' => $this->body ]);
		$this->assertValidResponse($res);
	}
	
}