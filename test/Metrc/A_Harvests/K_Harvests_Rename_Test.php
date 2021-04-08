<?php 

namespace Test\Metrc\A_Harvests;

class G_Harvests_Rename_Test extends \Test\Metrc_Test {

	protected $path = 'harvests/v1/rename';
	protected $body;

	protected function setUp() : void {
		$this->body = array(
			[
				"Id"=> 1,
				"OldName"=> null,
				"NewName"=> "2019-05-29-Flower Location B-H"
			],
			[
				"Id"=> null,
				"OldName"=> "2019-05-29-Flower Location A-H",
				"NewName"=> "2019-05-29-Flower Location B-H"
			]
		);
	}

	function test_put()
	{
		$res = $this->ghc->put($this->path, ['body' => $this->body]);
		$this->assertValidResponse($res);
	}
	
}