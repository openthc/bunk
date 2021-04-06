<?php 

namespace Test\Metrc\I_Strains;

class C_Strains_Test extends \Test\Metrc_Test {

	protected $path = 'strains/v1';

	function test_get()
	{
		$res = $this->ghc->get($this->path);
		$this->assertValidResponse($res);
	}

	function test_delete()
	{
		$res = $this->ghc->delete($this->path);
		$this->assertValidDelete($res, $this->path);
	}

}