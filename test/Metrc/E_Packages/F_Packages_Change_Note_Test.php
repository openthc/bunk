<?php 

namespace Test\Metrc\E_Packages;

class F_Packages_Change_Note_Test extends \Test\Metrc_Test {

	protected $path = 'packages/v1/change/note';

	function test_put()
	{
		$res = $this->ghc->put($this->path);
		$this->assertValidResponse($res);
	}

}