<?php 

namespace Test\Metrc\E_Packages;

class F_Packages_Change_Note_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/change/note';
	protected $body;

	protected function setUp() : void {
		$this->body = array(
			[
				"PackageLabel"=> "ABCDEF012345670000010041",
				"Note"=> "Package note here."
				],
				[
				"PackageLabel"=> "ABCDEF012345670000010042",
				"Note"=> ""
				]
		);
	}

	function test_put()
	{
		$res = $this->ghc->put($this->path, ['body' => $this->body]);
		$this->assertValidResponse($res);
	}

}